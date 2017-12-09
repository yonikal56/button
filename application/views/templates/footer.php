    <!-- End Of Main Content -->
    </main>
    <!-- Main Menu Bar -->
    <footer class="navbar navbar-fixed-bottom footerMenu">
        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
            <div class="glyphicon glyphicon-th-list phonemenu"></div>
        </button>
        <nav class="collapse navbar-collapse">
            <!-- Menu Links -->
            <ul class="nav navbar-nav pull-{direction}">
            <?php
            foreach($tabs as $tab)
            {
                echo "<li><a href='".  base_url_segment()."{$tab['page']}' data-toggle='tooltip' title='{$tab['title']}'>{$tab['name']}</a></li>";
            }
            ?>
                <!--<li><a href="{base_url_segment}" data-toggle="tooltip" title="{$lang.start_play}">{$lang.home}</a></li>
                <li><a href="{base_url_segment}add" data-toggle="tooltip" title="{$lang.add_your_own}">{$lang.add_question}</a></li>
                <?php if(!$if_connected): ?>
                <li><a href="{base_url_segment}user/register" data-toggle="tooltip" title="{$lang.register_now}">{$lang.new_account}</a></li>
                <li><a href="{base_url_segment}user/login" data-toggle="tooltip" title="{$lang.login_user}">{$lang.login}</a></li>
                <?php else: ?>
                <li><a href="{base_url_segment}user/logout" data-toggle="tooltip" title="{$lang.logout_user}">{$lang.logout} [{username}]</a></li>
                <?php endif; ?>
                <!--<li><a href="{base_url_segment}instructions" data-toggle="tooltip" title="לא יודעים כיצד לשחק? כאן תוכלו לקבל את כל התשובות">הוראות משחק</a></li>
                <li><a href="{base_url_segment}about" data-toggle="tooltip" title="כל מה שרציתם לדעת על האתר">אודות האתר</a></li>
                <li><a href="{base_url_segment}contact" data-toggle="tooltip" title="נשמח לשמור על קשר">צרו עמנו קשר</a></li>-->
            </ul>

            <!-- Copyrights Symbol -->
			<a href="http://arthur.systems/" class="pull-{opposite_direction}" style="padding: 10px; box-sizing: border-box;" target="_blank" data-toggle="tooltip" title="Design by Arthur.Systems"><img src="{base_url}images/arthursystems.png" alt="Arthur Systems"></a>
			
			<!-- Switch Language -->
			<ul class="nav navbar-nav pull-left">
				<li><a href="{base_url}" class="pull-{opposite_direction} flag" style="padding: 10px; box-sizing: border-box;" data-toggle="tooltip" title="שנה לעברית"><img src="{base_url}images/flags/il.png" alt="עברית"></a></li>
				<li><a href="{base_url}ru/" class="pull-{opposite_direction} flag" style="padding: 10px; box-sizing: border-box;" data-toggle="tooltip" title="Перейти на Русский"><img src="{base_url}images/flags/rus.png" alt="Русский"></a></li>
				<li><a href="{base_url}en/" class="pull-{opposite_direction} flag" style="padding: 10px; box-sizing: border-box;" data-toggle="tooltip" title="Switch To English"><img src="{base_url}images/flags/en.png" alt="English"></a></li>
			</ul>
        </nav>
        <!--<div class="glyphicon glyphicon-th-list phonemenu"></div>-->
    </footer>

    </body>
    <!-- Javascript Files -->
    <script type="text/javascript">
        var base_url = "{base_url_segment}";
    </script>
    <script type="text/javascript" src="{base_url}js/jquery-2.2.2.min.js"></script>
    <script type="text/javascript" src="{base_url}js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{base_url}js/script.js"></script>
    <!--
    Created by Arthur Systems (http://arthur.systems).
    © All rights reserved 2016.
    -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-56166868-2', 'auto');
	  ga('send', 'pageview');

	</script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-1220301400794390",
		enable_page_level_ads: true
	  });
	</script>
</html>