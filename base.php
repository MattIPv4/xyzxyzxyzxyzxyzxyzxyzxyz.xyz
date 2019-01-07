<?php function render($title, $content)
{
    ob_start(); ?>
    <!doctype HTML>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
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
                margin: 0 0 .5rem;
                color: #787878;
                font-size: 1.2rem;
            }

            h2 span:nth-child(even) {
                color: #4b4b4b;
            }

            h3 {
                margin: .5rem 0 0;
                color: #787878;
                font-size: 0.7rem;
            }

            h3 span {
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
        <h3>xyz<span>*8</span>.xyz is a site made by <a href="https://mattcowley.co.uk">Matt Cowley</a>.</h3>
    </div>
    </body>

    </html>
    <?php return ob_get_clean();
} ?>