<?php session_start();
	require('includes/config.php');
  require('partials/header.php');

  
    if(!isset($_GET['id'] )){
      ?>
<!-- html body start -->
<body class="container-fluid">
    <main class="container">
        <hero class="container">
            <div class="hero-content">
                <h2>Make every connection count</h2>
                <p> Create short links, QR Codes, and Link-in-bio pages. Share them anywhere.
                    Track what’s working, and what’s not. All inside the Bitly Connections Platform.</p>
            </div>
        </hero>
        <div class="shortner-section">
            <h3>Paste the URL to be shortened
            </h3>
                <form action="link-shortner.php" class="form-input" method = "POST">
                    <input type="text" name="longUrl" id="" placeholder="Paste Long URL" required >
                    <button type="submit">Submit</button>
                </form>
            <p>
                ShortURL is a free tool to shorten URLs and generate short links
                URL shortener allows to create a shortened link making it easy to share
            </p>
        </div>
        <div class="shortner-text-area">
            <h2>Simple and fast URL shortener!</h2>
            <p>ShortURL allows to shorten long links from Instagram, Facebook, YouTube, Twitter, Linked In, WhatsApp,
                TikTok, blogs and sites. Just paste the long URL and click the Shorten URL button. On the next page,
                copy the shortened URL and share it on sites, chat and emails. After shortening the URL, check how many
                clicks it received.
            </p>
            <h2>Shorten, share and track</h2>
            <p>Your shortened URLs can be used in publications, documents, advertisements, blogs, forums, instant
                messages, and other locations. Track statistics for your business and projects by monitoring the number
                of hits from your URL with our click counter.
            </p>
        </div>
    </main>
</body>
   <!--- html end---> 
  <?php }
    else{
      $shortId = $_GET['id'] ;
    $conn = new mysqli($db_name, $db_user, $db_pwd, $db_table_name);
    $query = "SELECT * FROM link_details WHERE short_url_value = '".$shortId."'"; 
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
           $row = $result->fetch_assoc();
           echo $furl = $row['full_url'];
           $hits=$row['click_count']+1;
           $sql = "update link_details set click_count='".$hits."' where id='".$row['id']."' ";
           echo $sql;
           $conn->query($sql);
           return header("location: ".$row['full_url']);
           echo $row['full_url'];
           }
           else 
            { 
           die("Invalid Link!");
           }
          }
?>
