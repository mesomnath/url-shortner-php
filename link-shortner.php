<?php session_start();
	require('includes/config.php');
    require('partials/header.php');
    
    
?>
<body class="container-fluid">
    <main class="container" style="display: flex;
    align-items: center;
    justify-content: center;height:100vh">
        <div class="shortner-section" style="min-width:50%;">
            <h3>Generated Short URL
            </h3>
                <div class="form-input">
                    <?php 
                    
                    $longUrl = $_POST["longUrl"];
                    $sqlCheckLongUrl ="select short_url_value, new_url from link_details where full_url= '$longUrl'";
                    // echo $sqlCheckLongUrl;
                    $result = $conn->query($sqlCheckLongUrl);

                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $shortenUrl = $row["new_url"];
                    }
                    } else 
                    {

                        //
                        $domain= $_GET['url'];
                        $short_url_value = random_string(5); //generate 5 digit url

                        //validate generated short url value is present or not
                        $sqlshorturlchekecker = "select short_url_value, new_url from link_details where short_url_value='$short_url_value'";
                        $result2 = $conn->query($sqlshorturlchekecker);

                        if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) {
                            $shortenUrl = $row["new_url"];
                        }
                    }

                        else{
                            $newUrl = $domain . $short_url_value;
                            $urlUpdater = "INSERT INTO link_details (full_url, short_url_value, new_url,click_count,created_on)
                            VALUES ('$longUrl', '$short_url_value', '$newUrl', 0, CURRENT_TIMESTAMP())";
                            $shortenUrl = $newUrl;
                            if ($conn->query($urlUpdater) === TRUE) {
                                $shortenUrl = $newUrl;
                            } else {
                            }
                            
                        }
                    

                    $shortenUrl =  random_string(5);
                    echo $shortenUrl;
                    }
                

                    // random string generator
                    function random_string($length) {
                        $key = '';
                        $keys = array_merge(range(0, 9), range('a', 'z'));
                    
                        for ($i = 0; $i < $length; $i++) {
                            $key .= $keys[array_rand($keys)];
                        }
                    
                        return $key;
                    }
                    $conn->close();                  
                    
                    ?>
                    <p class="link-generator-text" id="shortUrl"><?php echo $shortenUrl ?></p>
                    <button type="submit" id="copy"><i class="bi bi-copy"></i>COPY</button>
            </div>
            <p class="copy-alert"> URL Copied Successfully!</p>
            <div style="height:20px"></div>

            <h4>Share Link Now</h4>
            <div class="social_section">                
                <a href='https://www.facebook.com/sharer.php?u=<?php echo $shortenUrl ?>' target="blank"><i class="bi bi-facebook"></i></a>
                <a href='https://twitter.com/intent/tweet?url=<?php echo $shortenUrl ?>' target="blank"><i class="bi bi-twitter"></i></a>
                <a href='https://api.whatsapp.com/send?text=%0a<?php echo $shortenUrl ?>' target="blank"><i class="bi bi-whatsapp"></i></a>
                <a href='https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $shortenUrl ?>' target="blank"><i class="bi bi-linkedin"></i></a>

            </div>
        </div>
    </main>
</body>

<script src= "./assets/js/validator.js"></script>
</html>