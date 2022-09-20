<?php

namespace App\Models;



class Post
{
    private static $blog_posts = [
        [
            "tittle" => "First Post",
            "slug" => "first-post",
            "author" => "Fauzan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad iure, nihil eligendi nostrum aperiam ipsum numquam rem laudantium? Autem illo aut repellat, ex quod expedita minus ipsam voluptates quia quam totam est voluptatibus placeat odio debitis, eos harum! Consectetur quo voluptatibus accusamus atque, ex minus fuga aut? Aperiam cupiditate accusantium expedita incidunt dicta repellat, aut neque consectetur minima fugiat magnam rerum corporis placeat maxime est voluptatir perspiciatis quis eius optio quisquam. Officiis nobis eum voluptate vero corrupti in dolorem!bus aspernatu"
        ],
        [
            "tittle" => "Second Post",
            "slug" => "second-post",
            "author" => "Fauzan",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum possimus doloremque nam magnam vel at totam aliquid soluta mollitia expedita. Culpa cum minus laborum quia ex exercitationem sit, quaerat doloremque tenetur vel impedit quo temporibus totam, error nisi praesentium ipsa sequi porro iste ducimus labore dolores sed! Autem odio blanditiis cumque repellendus sequi id eius corrupti! Vel, nam nisi quo fugiat aliquam a, rem laborum, doloribus autem amet expedita repudiandae iure! Numquam, pariatur. Cupiditate soluta veniam neque sapiente blanditiis autem libero sunt, excepturi consequuntur, molestiae laborum dicta ex quae culpa ullam doloribus! Distinctio aspernatur corporis fuga impedit laudantium qui commodi voluptatibus, asperiores non tempora, numquam at doloribus excepturi itaque quis, quam consequuntur error illo blanditiis minus delectus. Repellendus, iusto. Excepturi perspiciatis, esse maiores quaerat repudiandae corporis eum, dicta non quos est porro inventore, accusantium consequuntur. Dolorem, laborum? Repudiandae optio ipsum excepturi alias, totam, cupiditate deleniti molestias, velit qui iusto culpa error et quisquam aspernatur nihil. Amet fugit dignissimos esse illo exercitationem dicta in vitae perspiciatis soluta ab dolorem molestiae libero itaque nesciunt, quaerat nostrum fuga incidunt necessitatibus architecto alias ipsa tenetur obcaecati magnam! Totam sunt alias, fuga vel iusto doloremque ea molestiae nihil optio dolore commodi, cupiditate deserunt a facilis."        ]
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        $post = [];

        return $posts->firstWhere('slug',$slug);
    }

}
