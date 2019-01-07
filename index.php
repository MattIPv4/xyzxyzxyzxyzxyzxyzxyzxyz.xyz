<?php

function error($code, $title, $extra)
{
    require_once "base.php";
    http_response_code($code);
    echo render($title, "<h1>" . $title . "</h1>" . ($extra ? "<p>" . $extra . "</p>" : ""));
}

function image($path)
{
    require_once "base.php";
    $content = "<a href='/i/raw/" . $path . "'><img src='/i/raw/" . $path . "' alt='" . $path . "'/></a>";
    echo render($path, $content, "/i/raw/" . $path);
}

function image_raw($path)
{
    if (!function_exists("mime_content_type")) {
        require_once "mimetype.php";
    }
    header("Content-type: " . mime_content_type("i/" . $path));
    echo file_get_contents("i/" . $path);
}

$route = strtok(trim($_SERVER['REQUEST_URI'], "/"), "?");
$route_1 = explode('/', $route, 2)[0];

switch ($route_1) {

    case "i":
        $route_2 = ($route == $route_1 ? "" : explode('/', $route, 3)[1]);
        switch ($route_2) {
            case "":
                error(503, "Access Denied",
                    "Sorry, you do not have permission to view the requested directory.");
                break;

            case "raw":
                $route_3 = ($route == $route_1 . "/" . $route_2 ? "" : explode('/', $route, 4)[2]);
                switch ($route_3) {
                    case "":
                        error(503, "Access Denied",
                            "Sorry, you do not have permission to view the requested directory.");
                        break;

                    default:
                        if (!file_exists("i/" . $route_3)) {
                            error(404, "File Not Found",
                                "Sorry, the resource you requested could not be found.");
                            break;
                        }
                        image_raw($route_3);
                        break;
                }
                break;

            default:
                if (!file_exists("i/" . $route_2)) {
                    error(404, "File Not Found",
                        "Sorry, the resource you requested could not be found.");
                    break;
                }
                image($route_2);
                break;
        }
        break;

    case "":
    default:
        error(503, "Access Denied",
            "Sorry, you do not have permission to view the requested directory.");
        break;
}
die();