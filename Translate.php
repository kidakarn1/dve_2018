<html lang="en-US"
      xmlns:og="http://opengraphprotocol.org/schema/"
      xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="http://phisan.sskru.ac.th/blog/xmlrpc.php">

        <!--[if lt IE 9]>
        <script src="http://phisan.sskru.ac.th/blog/wp-content/themes/the-box/js/html5.js" type="text/javascript"></script>
        <![endif]-->	
        <title>สร้าง Fixed Component บนหน้า Page ด้วย CSS &#8211; Phisan Sookkhee</title>
        <!-- PVC Template -->

        <script type="text/template" id="pvc-stats-view-template">
            <% if ( total_view > 0 ) { %>
            <%= total_view %> <%= total_view > 1 ? "total views" : "total view" %>,
            <% if ( today_view > 0 ) { %>
            <%= today_view %> <%= today_view > 1 ? "views today" : "view today" %>
            <% } else { %>
            no views today		<% } %>
            <% } else { %>
            No views yet	<% } %>
        </script>
        <link rel='dns-prefetch' href='//s0.wp.com' />
        <link rel='dns-prefetch' href='//s.gravatar.com' />
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        <link rel='dns-prefetch' href='//s.w.org' />
        <link rel="alternate" type="application/rss+xml" title="Phisan Sookkhee &raquo; Feed" href="http://phisan.sskru.ac.th/blog/feed" />
        <link rel="alternate" type="application/rss+xml" title="Phisan Sookkhee &raquo; Comments Feed" href="http://phisan.sskru.ac.th/blog/comments/feed" />
        <link rel="alternate" type="application/rss+xml" title="Phisan Sookkhee &raquo; สร้าง Fixed Component บนหน้า Page ด้วย CSS Comments Feed" href="http://phisan.sskru.ac.th/blog/archives/1143/feed" />
        <script type="text/javascript">
            window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/72x72\/", "ext":".png", "svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2\/svg\/", "svgExt":".svg", "source":{"concatemoji":"http:\/\/phisan.sskru.ac.th\/blog\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.6.1"}};
            !function(a, b, c){function d(a){var c, d, e, f, g, h = b.createElement("canvas"), i = h.getContext && h.getContext("2d"), j = String.fromCharCode; if (!i || !i.fillText)return!1; switch (i.textBaseline = "top", i.font = "600 32px Arial", a){case"flag":return i.fillText(j(55356, 56806, 55356, 56826), 0, 0), !(h.toDataURL().length < 3e3) && (i.clearRect(0, 0, h.width, h.height), i.fillText(j(55356, 57331, 65039, 8205, 55356, 57096), 0, 0), c = h.toDataURL(), i.clearRect(0, 0, h.width, h.height), i.fillText(j(55356, 57331, 55356, 57096), 0, 0), d = h.toDataURL(), c !== d); case"diversity":return i.fillText(j(55356, 57221), 0, 0), e = i.getImageData(16, 16, 1, 1).data, f = e[0] + "," + e[1] + "," + e[2] + "," + e[3], i.fillText(j(55356, 57221, 55356, 57343), 0, 0), e = i.getImageData(16, 16, 1, 1).data, g = e[0] + "," + e[1] + "," + e[2] + "," + e[3], f !== g; case"simple":return i.fillText(j(55357, 56835), 0, 0), 0 !== i.getImageData(16, 16, 1, 1).data[0]; case"unicode8":return i.fillText(j(55356, 57135), 0, 0), 0 !== i.getImageData(16, 16, 1, 1).data[0]; case"unicode9":return i.fillText(j(55358, 56631), 0, 0), 0 !== i.getImageData(16, 16, 1, 1).data[0]}return!1}function e(a){var c = b.createElement("script"); c.src = a, c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)}var f, g, h, i; for (i = Array("simple", "flag", "unicode8", "diversity", "unicode9"), c.supports = {everything:!0, everythingExceptFlag:!0}, h = 0; h < i.length; h++)c.supports[i[h]] = d(i[h]), c.supports.everything = c.supports.everything && c.supports[i[h]], "flag" !== i[h] && (c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && c.supports[i[h]]); c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && !c.supports.flag, c.DOMReady = !1, c.readyCallback = function(){c.DOMReady = !0}, c.supports.everything || (g = function(){c.readyCallback()}, b.addEventListener?(b.addEventListener("DOMContentLoaded", g, !1), a.addEventListener("load", g, !1)):(a.attachEvent("onload", g), b.attachEvent("onreadystatechange", function(){"complete" === b.readyState && c.readyCallback()})), f = c.source || {}, f.concatemoji?e(f.concatemoji):f.wpemoji && f.twemoji && (e(f.twemoji), e(f.wpemoji)))}(window, document, window._wpemojiSettings);
        </script>
        <style type="text/css">
            img.wp-smiley,
            img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
        </style>

        <link rel='stylesheet' id='glt-toolbar-styles-css'  href='http://phisan.sskru.ac.th/blog/wp-content/plugins/google-language-translator/css/toolbar.css?ver=4.6.1' type='text/css' media='all' />
        <!--ธงชาตินะคับ --><link rel='stylesheet' id='google-language-translator-css'  href='http://phisan.sskru.ac.th/blog/wp-content/plugins/google-language-translator/css/style.css?ver=4.6.1' type='text/css' media='all' /><!--ปิดcss ธงชาติ -->
        <link rel='stylesheet' id='a3-pvc-style-css'  href='http://phisan.sskru.ac.th/blog/wp-content/plugins/page-views-count/assets/css/style.min.css?ver=1.4.0' type='text/css' media='all' />
        <link rel='stylesheet' id='thebox-fonts-css'  href='//fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700%2C400italic%2C700italic%7COxygen%3A300%2C400%2C700&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
        <link rel='stylesheet' id='thebox-icons-css'  href='http://phisan.sskru.ac.th/blog/wp-content/themes/the-box/fonts/fa-icons.css?ver=1.7' type='text/css' media='all' />

<!--        <style id='thebox-style-inline-css' type='text/css'>

            .main-navigation,
            button,
            input[type='button'],
            input[type='reset'],
            input[type='submit'],
            .pagination .nav-links .current,
            .pagination .nav-links .current:hover,
            .pagination .nav-links a:hover {
                background-color: #0a917a;	
            }
            button:hover,
            input[type='button']:hover,
            input[type='reset']:hover,
            input[type='submit']:hover {
                background-color: rgba(10,145,122, 0.9);		
            }
            .entry-time {
                background-color: rgba(10,145,122, 0.7);		
            }
            .site-header .main-navigation ul ul a:hover,
            .site-header .main-navigation ul ul a:focus,
            .site-header .site-title a:hover,
            .page-title a:hover,
            .entry-title a:hover,
            .entry-meta a:hover,
            .entry-content a,
            .entry-summary a,
            .entry-footer a,
            .entry-footer .icon-font,
            .author-bio a,
            .comments-area a,
            .page-title span,
            .edit-link a,
            .more-link,
            .post-navigation a,
            #secondary a,
            #secondary .widget_recent_comments a.url { 
                color: #0a917a;
            }
            .edit-link a {
                border-color: #0a917a;
            }
        </style>-->
        <link rel='stylesheet' id='social-logos-css'  href='http://phisan.sskru.ac.th/blog/wp-content/plugins/jetpack/_inc/social-logos/social-logos.min.css?ver=1' type='text/css' media='all' />
        <link rel='stylesheet' id='jetpack_css-css'  href='http://phisan.sskru.ac.th/blog/wp-content/plugins/jetpack/css/jetpack.css?ver=4.3.2' type='text/css' media='all' />
        <link rel='stylesheet' id='codecolorer-css'  href='http://phisan.sskru.ac.th/blog/wp-content/plugins/codecolorer/codecolorer.css?ver=0.9.9' type='text/css' media='screen' />
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-content/plugins/google-language-translator/js/flags.js?ver=4.6.1'></script>
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-content/plugins/google-language-translator/js/toolbar.js?ver=4.6.1'></script>
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-content/plugins/google-language-translator/js/load-toolbar.js?ver=4.6.1'></script>
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/underscore.min.js?ver=1.8.3'></script>
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/backbone.min.js?ver=1.2.3'></script>
        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var vars = {"api_url":"http:\/\/phisan.sskru.ac.th\/blog\/wp-admin\/admin-ajax.php"};
                            /* ]]> */
        </script>
        <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-content/plugins/page-views-count/assets/js/pvc.backbone.min.js?ver=1.4.0'></script>
        <link rel='https://api.w.org/' href='http://phisan.sskru.ac.th/blog/wp-json/' />
        <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://phisan.sskru.ac.th/blog/xmlrpc.php?rsd" />
        <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://phisan.sskru.ac.th/blog/wp-includes/wlwmanifest.xml" /> 
        <link rel='prev' title='เริ่มต้นใช้งาน BeautifulSoup 4' href='http://phisan.sskru.ac.th/blog/archives/1134' />
        <link rel='next' title='ชลอชีวิตที่วิ่งเร็ว&#8230;ด้วยการ&#8230;ขีดๆ เขียนๆ' href='http://phisan.sskru.ac.th/blog/archives/1148' />
        <meta name="generator" content="WordPress 4.6.1" />
        <link rel="canonical" href="http://phisan.sskru.ac.th/blog/archives/1143" />
        <link rel='shortlink' href='http://wp.me/p3Tv3k-ir' />
        <link rel="alternate" type="application/json+oembed" href="http://phisan.sskru.ac.th/blog/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fphisan.sskru.ac.th%2Fblog%2Farchives%2F1143" />
        <link rel="alternate" type="text/xml+oembed" href="http://phisan.sskru.ac.th/blog/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fphisan.sskru.ac.th%2Fblog%2Farchives%2F1143&#038;format=xml" />
        <style type="text/css">.goog-te-gadget { margin-top:2px !important; }p.hello { font-size:12px; color:#666; }#google_language_translator { clear:both; }#flags { width:165px; }#flags a { display:inline-block; margin-right:2px; }#google_language_translator { width:auto !important; }#google_language_translator {color: transparent;}body { top:0px !important; }</style><meta property="fb:app_id" content="1581088585468700" />
        <meta property="og:site_name" content="Phisan Sookkhee" />
        <meta property="og:title" content="สร้าง Fixed Component บนหน้า Page ด้วย CSS" />
        <meta property="og:url" content="http://phisan.sskru.ac.th/blog/archives/1143" />
        <meta property="og:email" content="phisan.shukkhi@gmail.com" />
        <meta property="og:type" content="article" />

        <link rel='dns-prefetch' href='//v0.wordpress.com'>
        <link rel='dns-prefetch' href='//jetpack.wordpress.com'>
        <link rel='dns-prefetch' href='//s0.wp.com'>
        <link rel='dns-prefetch' href='//s1.wp.com'>
        <link rel='dns-prefetch' href='//s2.wp.com'>
        <link rel='dns-prefetch' href='//public-api.wordpress.com'>
        <link rel='dns-prefetch' href='//0.gravatar.com'>
        <link rel='dns-prefetch' href='//1.gravatar.com'>
        <link rel='dns-prefetch' href='//2.gravatar.com'>

        <!-- Jetpack Open Graph Tags -->
        <meta property="og:type" content="article" />
        <meta property="og:title" content="สร้าง Fixed Component บนหน้า Page ด้วย CSS" />
        <meta property="og:url" content="http://phisan.sskru.ac.th/blog/archives/1143" />
        <meta property="og:description" content="ต้องการสร้างเมนูสำหรับการสลับภาษาไทยไปมาระหว่าง อังกฤษ-ไทย-ลาว-เขมร โดยใช้ความสามารถในการแปลงภาษาบนหน้าเว็บเพจของ Google Translate API แต่ส่ิงที่ยากที่สุดสำหรับการทำงานนี้คือการออกแบบ ว่าจะออกแบบอย…" />
        <meta property="article:published_time" content="2015-08-02T05:42:10+00:00" />
        <meta property="article:modified_time" content="2015-08-02T05:45:51+00:00" />
        <meta property="og:site_name" content="Phisan Sookkhee" />
        <meta property="og:image" content="http://phisan.sskru.ac.th/blog/wp-content/uploads/2015/08/Screen-Shot-2558-08-02-at-12.26.05-PM.png" />
        <meta property="og:image:width" content="1434" />
        <meta property="og:image:height" content="916" />
        <meta property="og:locale" content="en_US" />
        <meta name="twitter:image" content="http://phisan.sskru.ac.th/blog/wp-content/uploads/2015/08/Screen-Shot-2558-08-02-at-12.26.05-PM.png?w=640" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:creator" content="@numvarn" />

        <style id="custom-css-css">.entry-content,.entry-summary{font-size:15px !important}.entry-content li{margin-bottom:15px}.entry-content ul,.entry-content ol{margin-left:0}.entry-content h1{border-bottom:1px solid #ccc;font-size:24px;margin:10px 0 15px}hgroup{width:50%}</style>
    </head>

    <script>jQuery(document).ready(function(a){a("a.nturl").on("click", function(){function l(){doGoogleLanguageTranslator(default_lang + "|" + default_lang)}function n(){doGoogleLanguageTranslator(default_lang + "|" + lang_prefix)}default_lang = "th", lang_prefix = a(this).attr("class").split(" ")[2], lang_prefix == default_lang?l():n()}), a("a.flag").on("click", function(){function l(){doGoogleLanguageTranslator(default_lang + "|" + default_lang)}function n(){doGoogleLanguageTranslator(default_lang + "|" + lang_prefix)}default_lang = "th", lang_prefix = a(this).attr("class").split(" ")[2], a(".tool-container").hide(), lang_prefix == default_lang?l():n()}), 0 == a("body > #google_language_translator").length && a("#glt-footer").html("<div id='google_language_translator'></div>")});</script>

    <div id="glt-translate-trigger">
        <span class="notranslate">Translate &raquo;</span>
    </div>
    <div id="glt-toolbar"></div>
    <div id="flags" style="display:none">
        <ul id="sortable" class="ui-sortable">
            <li id='English'><a title='English' class='notranslate flag en English'></a></li>
            <li id='Thai'><a title='Thai' class='notranslate flag th Thai'></a></li>
            <li id='Khmer'><a title='Khmer' class='notranslate flag km Khmer'></a></li>
            <li id='Lao'><a title='Lao' class='notranslate flag lo Lao'></a></li>
            <li id='Japanese'><a title='Japanese' class='notranslate flag ja Japanese'></a></li>
            <li id='Chinese'><a title='Chinese' class='notranslate flag zh-TW Chinese'></a></li>
        </ul>
    </div>
    <div id='glt-footer'></div><script type='text/javascript'>function GoogleLanguageTranslatorInit() { new google.translate.TranslateElement({pageLanguage: 'th', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, autoDisplay: false, multilanguagePage:true}, 'google_language_translator'); }</script><script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit'></script>	<div style="display:none">
    </div>


    <script type="text/javascript">
    window.WPCOM_sharing_counts = {"http:\/\/phisan.sskru.ac.th\/blog\/archives\/1143":1143};
    </script>
    <link rel='stylesheet' id='comments_evolved_tabs_css-css'  href='http://phisan.sskru.ac.th/blog/wp-content/plugins/gplus-comments/assets/styles/plugin.css?ver=1.6.3' type='text/css' media='all' />
    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/jquery/ui/tabs.min.js?ver=1.11.4'></script>
    <script type='text/javascript' src='http://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201731'></script>
    <script type='text/javascript' src='http://s.gravatar.com/js/gprofiles.js?ver=2017Augaa'></script>
    <script type='text/javascript'>
            /* <![CDATA[ */
            var WPGroHo = {"my_hash":""};
            /* ]]> */
    </script>

    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-content/plugins/jetpack/modules/wpgroho.js?ver=4.6.1'></script>
    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-content/themes/the-box/js/navigation.js?ver=20120206'></script>
    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/comment-reply.min.js?ver=4.6.1'></script>
    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-includes/js/wp-embed.min.js?ver=4.6.1'></script>
    <script type='text/javascript'>
            /* <![CDATA[ */
            var sharing_js_options = {"lang":"en", "counts":"1"};
            /* ]]> */
    </script>
    <script type='text/javascript' src='http://phisan.sskru.ac.th/blog/wp-content/plugins/jetpack/modules/sharedaddy/sharing.js?ver=4.3.2'></script>
    <script type='text/javascript'>
            var windowOpen;
            jQuery(document.body).on('click', 'a.share-google-plus-1', function() {
            // If there's another sharing window open, close it.
            if ('undefined' !== typeof windowOpen) {
            windowOpen.close();
            }
            windowOpen = window.open(jQuery(this).attr('href'), 'wpcomgoogle-plus-1', 'menubar=1,resizable=1,width=480,height=550');
            return false;
            });
            var windowOpen;
            jQuery(document.body).on('click', 'a.share-twitter', function() {
            // If there's another sharing window open, close it.
            if ('undefined' !== typeof windowOpen) {
            windowOpen.close();
            }
            windowOpen = window.open(jQuery(this).attr('href'), 'wpcomtwitter', 'menubar=1,resizable=1,width=600,height=350');
            return false;
            });
            var windowOpen;
            jQuery(document.body).on('click', 'a.share-facebook', function() {
            // If there's another sharing window open, close it.
            if ('undefined' !== typeof windowOpen) {
            windowOpen.close();
            }
            windowOpen = window.open(jQuery(this).attr('href'), 'wpcomfacebook', 'menubar=1,resizable=1,width=600,height=400');
            return false;
            });</script>
    <script type='text/javascript' src='http://stats.wp.com/e-201731.js' async defer></script>
    <script type='text/javascript'>
        _stq = window._stq || []; _stq.push([ 'clickTrackerInit', '57556418', '1143' ]);</script>
    <!-- Comments Evolved plugin -->

    <script>jQuery("#comments-evolved-tabs").tabs();</script>

