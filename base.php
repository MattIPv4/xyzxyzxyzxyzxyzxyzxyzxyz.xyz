<?php function render($title, $content, $image_url = "")
{
    $base_route = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    $full_route = $base_route . "/" . strtok(trim(rawurldecode($_SERVER['UNENCODED_URL'] ?? $_SERVER['REQUEST_URI']), "/"), "?");
    $image_url = ($image_url ? $base_route . $image_url : "");
    ob_start(); ?>
    <!doctype HTML>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>

        <link rel="image_src"
              content="<?php echo $image_url; ?>"/>

        <meta name="twitter:card"
              content="summary_large_image">

        <meta name="twitter:site"
              content="<?php echo $full_route; ?>"/>

        <meta name="twitter:creator"
              content="@MattIPv4"/>

        <meta name="twitter:title"
              content="<?php echo $title; ?>"/>

        <meta name="twitter:image"
              content="<?php echo $image_url; ?>"/>

        <meta name="twitter:url"
              content="<?php echo $full_route; ?>"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:title"
              content="<?php echo $title; ?>"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:type"
              content="website"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:locale"
              content="en_GB"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:site_name"
              content="<?php echo $title; ?>"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:url"
              content="<?php echo $full_route; ?>"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:image"
              content="<?php echo $image_url; ?>"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:image:url"
              content="<?php echo $image_url; ?>"/>

        <meta prefix="og: http://ogp.me/ns#" property="og:image:secure_url"
              content="<?php echo $image_url; ?>"/>

        <meta name="theme-color" content="#111"/>

        <style>
            html, body {
                background: #111;
                margin: 0;
                padding: 0;
                min-height: 100vh;
                color: #efefef;
            }

            body {
                line-height: 1.5;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            h2 {
                margin: 0;
                color: #787878;
                font-size: 1.2rem;
            }

            h2 span {
                opacity: 0;
            }

            h2 span:nth-child(even) {
                color: #4b4b4b;
            }

            h3 {
                margin: .4rem 0;
                color: #8f8f8f;
                font-size: 1.1rem;
                opacity: 0;
            }

            h4 {
                margin: .5rem 0 0;
                color: #787878;
                font-size: 0.7rem;
            }

            h4 span {
                font-size: 0.9em;
                color: #4b4b4b;
            }

            .content {
                background-color: #0A0A0A;
                border-radius: 0.2em;
                box-sizing: border-box;
                padding: 2rem;
                font-family: 'Segoe UI', Tahoma, sans-serif;
                display: inline-block;
                margin: 5rem;
                max-height: 100%;
                max-width: 100%;
            }

            .content, .content img {
                box-shadow: 0 4px 6px 1px rgba(0, 0, 0, 0.5);
            }

            .content a:hover img {
                box-shadow: 0 2px 2px 1px rgba(0, 0, 0, 0.7);
            }
        </style>

    </head>

    <body>
    <div class="content">
        <h2><?php echo str_repeat("<span>xyz</span>", 8); ?><span>.xyz</span></h2>
        <?php echo $content; ?>
        <h4>xyz<span>*8</span>.xyz is a site made by <a href="https://mattcowley.co.uk">Matt Cowley</a>.</h4>
    </div>

    <script>
        (function () {
            var elms = document.querySelectorAll("h2 span");
            var titles = document.querySelectorAll("h3");
            var delay = 500;

            for (var i = 0; i < titles.length; i++) {
                titles[i].style.opacity = "0";
                titles[i].style.transition = "opacity " + delay.toString() + "ms";
            }
            for (var i = 0; i < elms.length; i++) {
                elms[i].style.position = "relative";
                elms[i].style.top = "-5em";
                elms[i].style.opacity = "0";
                elms[i].style.transition = "all " + delay.toString() + "ms";
            }

            function doAnimation(i) {
                setTimeout(function () {
                    elms[i].style.top = "0";
                    elms[i].style.opacity = "1";
                }, (delay / 2) * (i));
            }

            setTimeout(function () {
                for (var i = 0; i < elms.length; i++) {
                    doAnimation(i);
                }
            }, delay / 2);

            setTimeout(function () {
                for (var i = 0; i < titles.length; i++) {
                    titles[i].style.opacity = "1";
                }
            }, delay);
        })();
    </script>
    </body>

    </html>
    <?php return ob_get_clean();
} ?>