<?php
  //contains all the functions
  require_once('../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.
?>

<!-- Staff Index root -->
<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/user_header.php'); ?>




<div class="container-fluid">
  <div id="jumbo" class="jumbotron">
    
    <h4><strong>Each participant's shares will be calculated in three pools.</strong></h4>
    
    <ul id="listTxt">
      <li><strong>Participants with 100 shares or less,</strong> will be 10% of the total remaining bounty or 2,812,500 RBM <strong>($337,500 USD at the current exchange*)</strong></li>
      <li><strong>Participants with 101-1000 shares,</strong> will have will have 30% of the remaining bounty or 8,437,500 RBM <strong>($1,012,500 USD at the current exchange*)</strong></li>
      <li><strong>Participants with over 1000 shares or more,</strong> will have 60% of the remaining bounty or 16,875,000 RBM. <strong>($2,025,000 USD at the current exchange*)</strong></li>
     </ul>
      
    <p>*The Price of one RBM Token at the time of release will be 0,000284-0,000426 ETH, depending on the date of purchase.</p>
    
    <h4><strong>There are three ways to earn your shares of the bounty: </strong></h4>
    
    <ol id="listTxt">
      <li>Spread the word: Social Media + Referral by email
        <ul>
          <strong>Referral by email (Tell a friend about Robomed Bounty for Good)</strong>
          <li>You and a friend each receive 100 shares </li><br>
          
          <strong>Facebook:</strong>
          <li>Earn 5 shares per liked post</li>
          <li>Earn 10 shares for liking us on Facebook</li>
          <li>Earn 30 shares for sharing a Robomed post (two per day)</li>
          <li>Post about Robomed using #bountyforgood</li><br>
          
          <strong>LinkedIn:</strong>
          <li>Earn 5 shares per liked post</li>
          <li>Earn 10 shares for following us on LinkedIn</li>
          <li>Earn 30 shares for sharing a Robomed post on Linkedin (two per day)</li><br>
          
          <strong>Twitter:</strong>
          <li>Earn 5 shares per liked post</li>
          <li>Earn 10 shares for following us on Twitter</li>
          <li>Earn 30 shares for retweeting a Robomed post (two per day)</li><br>
          
          <strong>Reddit:</strong>
          <li>Earn 10 shares for subscribing to the Robomed reddit page</li>
          <li>Earn 15 shares for every upvote (two per day)</li>
          <li>Write a thread about Robomed on Reddit (see below)</li><br>
          
          <strong>Telegram:</strong>
          <li>30 shares for joining our telegram</li><br>
        </ul>
      </li>
      <li>Write Blog post or Reddit Thread about Robomed
        <ul>
        <li>Shares are distributed based off the number of subscribers for Reddit and views for blog posts</li>
        <li>Must be written in English, Chinese, Russian, or Spanish </li>
          <li>Post must have at least two links to robomed.io</li>
        </ul>
        50 shares for 100+ subscribers/views<br>
        100 shares for 500+ subscribers/views<br>
        500 shares for 1000+ subscribers/views<br>
        1,000 shares for 10,000+ subscribers/views<br>
        5,000 shares for 50,000+ subscribers/views<br>
        10,000 shares for 100,000+ subscribers/views<br>
      </li><br>
      <li>Translate blog posts for use in other countries Translation services:
		<ul>
          <li>100 shares per translation (telegram group)</li>
          <li>Join our telegram group for details</li>
        </ul>	
      </li><br>
      <strong>The bounty program will run until the completion of the ICO on December 15th, 2017.</strong> Tokens will be issued starting December 8th, 2017 a week prior to the end of the ICO. Token allocation will be calculated based of each participant's percent ownership of the total number of shares and users digital wallets will be credited.<br><br>


<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
