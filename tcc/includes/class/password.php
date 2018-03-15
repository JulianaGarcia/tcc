<?php 
    // Número de caracteres do Salt Number
    define( 'SALT_SIZE', 15 );
    $salt = generateSalt();

    function generateSalt(){
        // Array com os 62 caracteres (a-z, A-Z, 0-9)
        $amostra = array_merge( range( 'a', 'z' ), range( 'A', 'Z' ), range( 0, 9 ) );
        
        // Embaralha o array
        shuffle( $amostra );
        
        $index = array_rand( $amostra, SALT_SIZE );
        
        $salt = '';
        
        for ( $i = 0; $i < SALT_SIZE; $i++ ){
            $salt .= $amostra[ $i ];
        }
        
        return $salt;
    }

    function hashPasswdWithSalt( $passwd, $salt ){
        return sha1( md5( $passwd . $salt ) );
    }
    
    function checkPasswd( $connection, $email, $passwd ){
        $query  = mysqli_query($connection, "SELECT senha, salt FROM ong.usuario WHERE email = '$email'");
        
        if(mysqli_num_rows($query) != 0){
            $result     = mysqli_fetch_assoc($query);
            $passwdOnBD = $result["senha"];
            $salt       = $result["salt"];
            
            if(sha1( md5( $passwd . $salt ) ) == $passwdOnBD)
                return true;
            else
                return false;
        }else
            return false;
    }

    //SALVANDO USUARIO NO COOKIE
    define( 'HASH_KEY', md5( 'sacifufu' ) );
    define( 'HASH_PATTERN', HASH_KEY . '%d' . '%s' );
    
    function hashForCookie( $connection, $senha, $email ){
        $senhaHash = sha1(sprintf( HASH_PATTERN, time(), $senha ));
        mysqli_query($connection, "UPDATE ong.usuario SET hash_cookie = '$senhaHash' WHERE email = '$email'");
        // $hash   = '2f9a922f0401476cd7089c235d76de5bb61150b9'; 
        $dados  = array( 'email' => $email, 'senha' => $senhaHash );
        setcookie( 'siteAuth', serialize( $dados ), time() + (10 * 365 * 24 * 60 * 60) ); //O COOKIE IRÁ EXPIRAR APÓS 10 ANOS

        return $senhaHash;
    }

    function checkHash( $connection, $email, $hash ){
        $query  = mysqli_query($connection, "SELECT * FROM ong.usuario WHERE email = '$email' AND hash_cookie = '$hash' ");
        
        if(mysqli_num_rows($query) != 0)
            return true;
        else
            return false;
    }

    function userId( $connection, $email, $hash ){
        $query  = mysqli_query($connection, "SELECT id FROM ong.usuario WHERE email = '$email' AND hash_cookie = '$hash' ");
        
        $result = mysqli_fetch_assoc($query);
        return $result["id"];
    }
?>