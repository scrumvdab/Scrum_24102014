@extends('templates.default')
@section('content')
<div class="container" id="content">
    <?php
    $c = -1;
    $r = -1;
    $rr = -1;

    if (isset($_COOKIE["id"])) {
        $waardeid = $_COOKIE["id"];
    }
    if (isset($_COOKIE["beoordeling"]) && ($_COOKIE["beoordeling"] == "like")) {
        $waardebeoordeling = $_COOKIE["beoordeling"];
        if (isset($_COOKIE["laag"])) {
            $waardelaag = $_COOKIE["laag"];
            $gansecookie = "dislike" . $waardelaag . $waardeid;
            $klikcookie = "like" . $waardelaag . $waardeid;
            //print("<h1>Niet aangeklikt: " . $gansecookie . "</h1>");
            //print("<h1>Aangeklikt: " . $klikcookie . "</h1>");
            if (isset($_COOKIE[$klikcookie]) && ($_COOKIE[$klikcookie]) == "zonetverhoogd") {

                switch ($_COOKIE["laag"]) {
                    case "comment":
                        DB::table('forum_comments')->where('id', $waardeid)->increment('like');
                        break;
                    case "reply":
                        DB::table('forum_replies')->where('id', $waardeid)->increment('like');
                        break;
                    case "replyreply":
                        DB::table('forum_replies_replies')->where('id', $waardeid)->increment('like');
                        break;
                }
                /*
                  setcookie($klikcookie, "liked1", time() + 3600);
                  setcookie($gansecookie, "disliked0", time() + 3600);
                  Header('Location: ' . $_SERVER['PHP_SELF']);
                  Exit(); */
            } else {
                if (isset($_COOKIE[$gansecookie]) && ($_COOKIE[$gansecookie] == "verlaagbaar")) {
                    switch ($_COOKIE["laag"]) {
                        case "comment":
                            DB::table('forum_comments')->where('id', $waardeid)->where('dislike', '>', 0)->decrement('dislike');
                            break;
                        case "reply":
                            DB::table('forum_replies')->where('id', $waardeid)->where('dislike', '>', 0)->decrement('dislike');
                            break;
                        case "replyreply":
                            DB::table('forum_replies_replies')->where('id', $waardeid)->where('dislike', '>', 0)->decrement('dislike');
                            break;
                    }
                    ?>
                    <script>
                        createCookie("like" + getCookie(laag) + getCookie(id), "liked1", "10");
                        createCookie("dislike" + getCookie(laag) + getCookie(id), "disliked0", "10");
                    </script>
                    <?php
                    /*
                      setcookie($gansecookie, "", time() + 3600);
                      setcookie($klikcookie, "", time() + 3600);

                      unset($_COOKIE[$gansecookie]);
                      unset($_COOKIE[$klikcookie]); /*
                      unset($_COOKIE["id"]);
                      unset($_COOKIE["beoordeling"]);
                      unset($_COOKIE["laag"]);
                      Header('Location: ' . $_SERVER['PHP_SELF']);
                      Exit(); */
                }
            }
        }
    } else if (isset($_COOKIE["beoordeling"]) && ($_COOKIE["beoordeling"] == "dislike")) {
        $waardebeoordeling = $_COOKIE["beoordeling"];
        if (isset($_COOKIE["laag"])) {
            $waardelaag = $_COOKIE["laag"];
            $gansecookie = "like" . $waardelaag . $waardeid;
            $klikcookie = "dislike" . $waardelaag . $waardeid;
            //print("<h1>Niet aangeklikt: " . $gansecookie . "</h1>");
            //print("<h1>Aangeklikt: " . $klikcookie . "</h1>");
            if (isset($_COOKIE[$klikcookie]) && ($_COOKIE[$klikcookie]) == "zonetverhoogd") {
                switch ($_COOKIE["laag"]) {
                    case "comment":
                        DB::table('forum_comments')->where('id', $waardeid)->increment('dislike');
                        break;
                    case "reply":
                        DB::table('forum_replies')->where('id', $waardeid)->increment('dislike');
                        break;
                    case "replyreply":
                        DB::table('forum_replies_replies')->where('id', $waardeid)->increment('dislike');
                        break;
                }
                /*
                  setcookie($klikcookie, "disliked1", time() + 3600);
                  setcookie($gansecookie, "liked0", time() + 3600);
                  Header('Location: ' . $_SERVER['PHP_SELF']);
                  Exit(); */
            } else {
                if (isset($_COOKIE[$gansecookie]) && ($_COOKIE[$gansecookie] == "verlaagbaar")) {
                    switch ($_COOKIE["laag"]) {
                        case "comment":
                            DB::table('forum_comments')->where('id', $waardeid)->where('like', '>', 0)->decrement('like');
                            break;
                        case "reply":
                            DB::table('forum_replies')->where('id', $waardeid)->where('like', '>', 0)->decrement('like');
                            break;
                        case "replyreply":
                            DB::table('forum_replies_replies')->where('id', $waardeid)->where('like', '>', 0)->decrement('like');
                            break;
                    }
                    /*
                      setcookie($gansecookie, "", time() + 3600);
                      setcookie($klikcookie, "", time() + 3600);

                      unset($_COOKIE[$gansecookie]);
                      unset($_COOKIE[$klikcookie]);

                      setcookie('id', time() - 3600);
                      setcookie('beoordeling', time() - 3600);
                      setcookie('laag', time() - 3600);
                      unset($_COOKIE["id"]);
                      unset($_COOKIE["beoordeling"]);
                      unset($_COOKIE["laag"]);

                      Header('Location: ' . $_SERVER['PHP_SELF']);
                      Exit(); */
                }
            }
        }
    }

    /*
      setcookie('id', time() - 3600);
      setcookie('beoordeling', time() - 3600);
      setcookie('laag', time() - 3600);
      unset($_COOKIE["id"]);
      unset($_COOKIE["beoordeling"]);
      unset($_COOKIE["laag"]); */
    ?>
    <div class="navbar">
        <div class="jumbotron" style="overflow:auto;">
            <div class="container">
                @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="clearfix">
                    <ol class="breadcrumb pull-left">
                        <li><a href="{{ URL::route('forum-home') }}">Forums</a></li>
                        <li><a href="{{ URL::route('forum-category', $thread->category_id) }}">{{ $thread->category->title }}</a></li>
                        <li class="active">{{ $thread->title }}</li>
                    </ol>
                    @if(Auth::user())
                    @if(Auth::user()->isAdmin() || Auth::user()->id == $thread->author_id)

                    <a href="{{ URL::route('forum-delete-thread', $thread->id) }}" class="btn btn-danger pull-right">Verwijder</a>
                    @endif
                    @endif

                </div>
                <div class="well">
                    <h2>{{ $thread->title }}</h2>
                    <img style="border:1px red; height:100px; width:100px; float:right;" src="/Scrum/public/uploads/{{$user = DB::table('users')->where('id', $thread->author_id)->first()->id}}.jpg">
                    <br>
                    <h4>Verzonden door: {{ $author }} op {{ $thread->created_at }}</h4>
                    <hr>
                    <p>{{ nl2br(BBCode::parse($thread->body)) }}</p>
                    <!-- knop toevoegen comment aan thread (begin code)-->
                    <div id="form_thread">
                        @if(Auth::user())
                        <button type="button" class="btn btn-success" id="bo">Beantwoord onderwerp</button>
                        @endif
                        <!-- knop verwijder thread staat al hierboven
                        @if (Auth::check() && Auth::user()->isAdmin())
                        <a href="{{ URL::route('forum-delete-thread', $thread->id) }}" class="btn btn-danger">Verwijder onderwerp</a>
                        @endif
                        -->
                    </div>
                    <!-- knop toevoegen comment aan thread (einde code)-->
                </div>

                <!-- commentaar geven op het onderwerp (begin code formulier)-->
                @if(Auth::check())
                <div id="formcomment" style="border:2px solid red; display:none;">
                    <form style="margin:10px;" action="{{ URL::route('forum-store-comment', $thread->id) }}" method="post">
                        <div class="form-group">
                            <label for="body">Body: </label>
                            <textarea class="form-control" name="body" id="body"></textarea>
                        </div>
                        {{ Form::token() }}
                        <div class="form-group">
                            <input type="submit" value="Bewaar commentaar" class="btn btn-primary">
                            <button type="button" class="btn btn-danger" id="formcommentannuleer">Annuleren</button>
                        </div>
                    </form>
                </div>
                @endif
                <!-- commentaar geven op het onderwerp (einde code formulier)-->

                <!-- begin tonen van de comments-->
                @foreach ($thread->comments()->get() as $comment)

                <div id="comment"  style="overflow:auto; border:1px solid orange;">
                    <div class="well" style="overflow:auto;">

                        <div class="pull-right">

                            <h4>Verzonden door: {{ $comment->author->username }} op {{ $comment->created_at }}</h4>
                            <img style="border:1px red; height:100px; width:100px; float:right;" src="/Scrum/public/uploads/{{$user = DB::table('users')->where('id', $comment->author_id)->first()->id}}.jpg"/>
                            <br>
                        </div>
                        <br>
                        <div style="" class="pull-right">
                            <a href="#" >
                                <img class="like" id="{{ $comment->id }}" data-laag="comment" data-beoordeling="like" style="border:1px red; height:40px; width:40px;" src='/Scrum/public/uploads/like.jpg'>
                            </a>
                            <br>
                            <h4 class="{{ $comment->id }}">{{ $comment->like }}</h4>
                            <a href="#" >
                                <img class="dislike" id="{{ $comment->id }}" data-laag="comment" data-beoordeling="dislike" style="border:1px red; height:40px; width:40px;" src="/Scrum/public/uploads/dislike.jpg">
                            </a>
                            <br>
                            <h4 class="{{ $comment->id }}">{{ $comment->dislike }}</h4>
                            <br>
                            <br>
                            <br>
                        </div>
                        <p style="<?php
                        if (nl2br(BBCode::parse($comment->body)) == '(verwijderd)') {
                            print("color:lightgrey");
                        } else {
                            print("color:black");
                        }
                        ?>
                           ">{{ nl2br(BBCode::parse($comment->body)) }}</p>
                        <!-- knoppen toevoegen reply aan comment/verwijderen comment (begin code)-->
                        <div class="form_comment">
                            @if(Auth::user())
                            <?php
                            if (isset($c)) {
                                $c++;
                                print("comment: " + $c);
                            }
                            ?>
                            <button type="button" data-klik="<?php print($c); ?>" class="btn btn-success bc">Beantwoord commentaar</button>
                            @endif
                            @if (Auth::check() && Auth::user()->isAdmin())
                            <a href="{{ URL::route('forum-delete-comment', $comment->id) }}" class="btn btn-danger">Verwijder commentaar</a>
                            @endif
                        </div>
                        <!-- knoppen toevoegen reply /verwijderen comment (einde code)-->
                    </div>


                    <!-- tonen van de replies-->
                    <!-- reply geven op een comment (begin code formulier)-->
                    @if(Auth::check())
                    <div class="formreply" style="width:80%; float:right; border:2px solid purple;  display:none;">
                        <form style="overflow:auto; margin:10px;" action="{{ URL::route('forum-store-reply', $comment->id) }}" method="post">
                            <div class="form-group">
                                <label for="body">Body: </label>
                                <textarea class="form-control" name="body" id="body"></textarea>
                            </div>
                            {{ Form::token() }}
                            <div class="form-group">
                                <input type="submit" value="Bewaar reply" class="btn btn-primary">
                                <button type="button" class="btn btn-danger formreplyannuleer">Annuleren</button>
                            </div>
                        </form>
                    </div>
                    @endif
                    <!-- reply geven op een comment (einde code formulier)-->

                    <!-- begin tonen van de replies-->
                    @foreach ($comment->replies()->get() as $reply)


                    <div id="reply">

                        <div class="well pull-right" style="overflow:auto; width:80%;">
                            <div class="pull-right">

                                <h4>Verzonden door: {{ $reply->author->username }} op {{ $reply->created_at }}</h4>
                                <img style="border:1px red; height:100px; width:100px; float:right;" src="/Scrum/public/uploads/{{$user = DB::table('users')->where('id', $reply->author_id)->first()->id}}.jpg"/>
                                <br>
                            </div>
                            <br>
                            <div style="" class="pull-right">
                                <a href="#">
                                    <img class="like" data-laag="reply" data-beoordeling="like" id="{{ $reply->id }}" style="border:1px red; height:40px; width:40px;" src='/Scrum/public/uploads/like.jpg'>
                                </a>
                                <br>
                                <h4 class="{{ $reply->id }}">{{ $reply->like }}</h4>
                                <a href="#">
                                    <img class="dislike" data-laag="reply" data-beoordeling="dislike" id="{{ $reply->id }}" style="border:1px red; height:40px; width:40px;" src="/Scrum/public/uploads/dislike.jpg">
                                </a>
                                <br>
                                <h4 class="{{ $reply->id }}">{{ $reply->dislike }}</h4>
                                <br>
                                <br>
                                <br>
                            </div>
                            <p style="<?php
                            if (nl2br(BBCode::parse($reply->body)) == '(verwijderd)') {
                                print("color:lightgrey");
                            } else {
                                print("color:black");
                            }
                            ?>
                               ">{{ nl2br(BBCode::parse($reply->body)) }}</p>
                            <!-- knoppen toevoegen replyreply aan reply/verwijderen reply (begin code)-->
                            <div class="form_reply">
                                @if(Auth::user())
                                <div class="">
                                    <?php
                                    if (isset($r)) {
                                        $r++;
                                        print("reply : " + $r);
                                    }
                                    ?>
                                    <button data-klik="<?php print($r); ?>" type="button" class="btn btn-success br">Beantwoord reply</button>
                                </div>
                                @endif
                                @if (Auth::check() && Auth::user()->isAdmin())
                                <div class="">
                                    <a href="{{ URL::route('forum-delete-reply', $reply->id) }}" class="btn btn-danger">Verwijder reply</a>

                                </div>
                                @endif
                            </div>
                            <!-- knoppen toevoegen replyreply aan reply/verwijderen reply (einde code)-->
                            <!-- reply geven op een reply (begin code formulier)-->
                            @if(Auth::check())
                            <div class="formreplyreply" style="width:60%; float:right; border:2px solid brown; display:none;">
                                <form style="overflow:auto; margin:10px;" action="{{ URL::route('forum-store-reply-reply', $reply->id) }}" method="post">
                                    <div class="form-group">
                                        <label for="body">Body: </label>
                                        <textarea class="form-control" name="body" id="body"></textarea>
                                    </div>
                                    {{ Form::token() }}
                                    <div class="form-group">
                                        <input type="submit" value="Bewaar reply reply" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger formreplyreplyannuleer">Annuleren</button>
                                    </div>
                                </form>
                            </div>
                            @endif
                            <!-- reply geven op een reply (einde code formulier)-->

                            <!-- begin tonen van de repliesreplies-->
                            @foreach ($reply->repliesreplies()->get() as $replyreply)

                            <div id="replyreply">
                                <div class="well pull-right" style="overflow:auto; width:60%;">
                                    <div class="pull-right">
                                        <?php
                                        if (isset($rr)) {
                                            $rr++;
                                            print($rr);
                                        }
                                        ?>
                                        <h4>Verzonden door: {{ $replyreply->author->username }} op {{ $replyreply->created_at }}</h4>
                                        <img style="border:1px red; height:100px; width:100px; float:right;" src="/Scrum/public/uploads/{{$user = DB::table('users')->where('id', $replyreply->author_id)->first()->id}}.jpg"/>
                                        <br>
                                    </div>
                                    <br>
                                    <div style="" class="pull-right">
                                        <a href="#">
                                            <img class="like" data-laag="replyreply" data-beoordeling="like" id="{{ $replyreply->id }}" style="border:1px red; height:40px; width:40px;" src='/Scrum/public/uploads/like.jpg'>
                                        </a>
                                        <br>
                                        <h4 class="{{ $replyreply->id }}">{{ $replyreply->like }}</h4>
                                        <a href="#">
                                            <img class="dislike" data-laag="replyreply" data-beoordeling="dislike" id="{{ $replyreply->id }}" style="border:1px red; height:40px; width:40px;" src="/Scrum/public/uploads/dislike.jpg">
                                        </a>
                                        <br>
                                        <h4 class="{{ $replyreply->id }}">{{ $replyreply->dislike }}</h4>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                    <p style="<?php
                                    if (nl2br(BBCode::parse($replyreply->body)) == '(verwijderd)') {
                                        print("color:lightgrey");
                                    } else {
                                        print("color:black");
                                    }
                                    ?>
                                       ">{{ nl2br(BBCode::parse($replyreply->body)) }}</p>
                                    <!-- knoppen toevoegen replyreplyreply aan reply/verwijderen replyreply (begin code)-->
                                    <!-- geen reply reply reply by reply reply
                                    <div id="form_reply_reply">
                                    @if(Auth::user())
                                    <div class="">
                                        <a href="{{ URL::route('forum-store-reply-reply', $replyreply->id)}}" class="btn btn-success">Beantwoord reply reply</a>
                                    </div>
                                    @endif
                                    </div>
                                    -->
                                    <!-- knoppen toevoegen replyreplyreply aan reply/verwijderen replyreply (einde code)-->                                    
                                    @if (Auth::check() && Auth::user()->isAdmin())
                                    <div class="">
                                        <a href="{{ URL::route('forum-delete-reply-reply', $replyreply->id) }}" class="btn btn-danger">Verwijder reply reply</a>

                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <!-- einde tonen van de repliesreplies-->                      
                        </div>
                    </div>
                    @endforeach
                    <!-- einde tonen van de replies-->                    
                </div>
                @endforeach
                <!-- einde tonen van de comments-->  
            </div>
        </div>
    </div>
</div>

<script>
    var likeknoppen = document.getElementsByClassName('like');
    for (i = 0; i < likeknoppen.length; i++)
    {
        likeknoppen[i].addEventListener("click", function() {
            console.log(this.id);
            if (getCookie(this.dataset.beoordeling + this.dataset.laag + this.id))
            {
                if (getCookie(this.dataset.beoordeling + this.dataset.laag + this.id) == "zonetverhoogd") {
                    alert("Uw heeft dit item reeds geliked!");
                    /*deleteAllCookies();
                     clearCookie("id");
                     clearCookie("beoordeling");
                     clearCookie("laag");*/
                    createCookie("like" + this.dataset.laag + this.id, "liked1", "10");
                    createCookie("dislike" + this.dataset.laag + this.id, "disliked0", "10");
                }
                else if (getCookie("dislike" + this.dataset.laag + this.id) == "zonetverhoogd") {
                    alert("Uw reeds eerder uitgevoerde dislike wordt ongedaan gemaakt!");
                    /*deleteAllCookies();
                     clearCookie("id");
                     clearCookie("beoordeling");
                     clearCookie("laag");*/
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    clearCookie("like" + this.dataset.laag + this.id);
                    createCookie("dislike" + this.dataset.laag + this.id, "verlaagbaar", "10");
                } else if (getCookie("dislike" + this.dataset.laag + this.id) == "disliked1") {
                    alert("Uw reeds eerder uitgevoerde dislike wordt ongedaan gemaakt!");/*
                     deleteAllCookies();
                     clearCookie("id");
                     clearCookie("beoordeling");
                     clearCookie("laag");*/
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    clearCookie(this.dataset.beoordeling + this.dataset.laag + this.id);
                    createCookie("dislike" + this.dataset.laag + this.id, "verlaagbaar", "10");
                } else if (getCookie(this.dataset.beoordeling + this.dataset.laag + this.id) !== "liked1") {
                    alert("stop eens met klikken!");
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    clearCookie("dislike" + this.dataset.laag + this.id);
                    //createCookie(this.dataset.beoordeling + this.dataset.laag + this.id, "zonetverhoogd", "10");
                } else {
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    //createCookie("like" + this.dataset.laag + this.id, "verlaagbaar", "10");

                }
            }
            else if (getCookie("dislike" + this.dataset.laag + this.id) === "disliked1") {
                /*deleteAllCookies();
                 clearCookie("id");
                 clearCookie("beoordeling");
                 clearCookie("laag");*/
                createCookie("id", this.id, "10");
                createCookie("beoordeling", this.dataset.beoordeling, "10");
                createCookie("laag", this.dataset.laag, "10");
                createCookie("dislike" + this.dataset.laag + this.id, "verlaagbaar", "10");
                //clearCookie("dislike" + this.dataset.laag + this.id);
            } else {
                createCookie("id", this.id, "10");
                createCookie("beoordeling", this.dataset.beoordeling, "10");
                createCookie("laag", this.dataset.laag, "10");
                createCookie("dislike" + this.dataset.laag + this.id, "verlaagbaar", "10");
                createCookie(this.dataset.beoordeling + this.dataset.laag + this.id, "zonetverhoogd", "10");
            }
            location.reload();
        });
    }
    var dislikeknoppen = document.getElementsByClassName('dislike');
    for (i = 0; i < dislikeknoppen.length; i++)
    {
        dislikeknoppen[i].addEventListener("click", function() {
            console.log(this.id);
            if (getCookie(this.dataset.beoordeling + this.dataset.laag + this.id))
            {
                if (getCookie(this.dataset.beoordeling + this.dataset.laag + this.id) == "zonetverhoogd") {
                    alert("Uw heeft dit item reeds gedisliked!");
                    /*deleteAllCookies();
                     clearCookie("id");
                     clearCookie("beoordeling");
                     clearCookie("laag");*/
                    createCookie("dislike" + this.dataset.laag + this.id, "disliked0", "10");
                    createCookie("like" + this.dataset.laag + this.id, "liked1", "10");
                }
                else if (getCookie("like" + this.dataset.laag + this.id) == "zonetverhoogd") {
                    alert("Uw reeds eerder uitgevoerde like wordt ongedaan gemaakt!");
                    /*deleteAllCookies();
                     clearCookie("id");
                     clearCookie("beoordeling");
                     clearCookie("laag");*/
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    clearCookie(this.dataset.beoordeling + this.dataset.laag + this.id);
                    createCookie("like" + this.dataset.laag + this.id, "verlaagbaar", "10");
                }
                else if (getCookie("like" + this.dataset.laag + this.id) == "liked1") {
                    alert("Uw reeds eerder uitgevoerde like wordt ongedaan gemaakt!");
                    /*deleteAllCookies();
                     clearCookie("id");
                     clearCookie("beoordeling");
                     clearCookie("laag");*/
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    clearCookie(this.dataset.beoordeling + this.dataset.laag + this.id);
                    createCookie("like" + this.dataset.laag + this.id, "verlaagbaar", "10");
                } else if (getCookie(this.dataset.beoordeling + this.dataset.laag + this.id) !== "disliked1") {
                    alert("stop eens met klikken!");
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    clearCookie("like" + this.dataset.laag + this.id);
                    //createCookie(this.dataset.beoordeling + this.dataset.laag + this.id, "zonetverhoogd", "10");
                } else {
                    createCookie("id", this.id, "10");
                    createCookie("beoordeling", this.dataset.beoordeling, "10");
                    createCookie("laag", this.dataset.laag, "10");
                    //createCookie("dislike" + this.dataset.laag + this.id, "verlaagbaar", "10");

                }
            }
            else if (getCookie("like" + this.dataset.laag + this.id) === "liked1") {
                /*deleteAllCookies();
                 clearCookie("id");
                 clearCookie("beoordeling");
                 clearCookie("laag");*/
                createCookie("id", this.id, "10");
                createCookie("beoordeling", this.dataset.beoordeling, "10");
                createCookie("laag", this.dataset.laag, "10");
                createCookie("like" + this.dataset.laag + this.id, "verlaagbaar", "10");
                //clearCookie("like" + this.dataset.laag + this.id);
            } else {
                createCookie("id", this.id, "10");
                createCookie("beoordeling", this.dataset.beoordeling, "10");
                createCookie("laag", this.dataset.laag, "10");
                createCookie("like" + this.dataset.laag + this.id, "verlaagbaar", "10");
                createCookie(this.dataset.beoordeling + this.dataset.laag + this.id, "zonetverhoogd", "10");
            }
            location.reload();
        });
    }
    function createCookie(name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }

    function clearCookie(naam) {
        /*
         verwijdert een cookie
         naam: cookienaam
         */
        createCookie(naam, "", -1);
    }

    function deleteAllCookies() {
        var cookies = document.cookie.split(";");
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }
    function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0)
                return null;
        }
        else
        {
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
                end = dc.length;
            }
        }
        return unescape(dc.substring(begin + prefix.length, end));
    }


</script>

{{ HTML::script('http://code.jquery.com/jquery-2.1.1.min.js') }}
{{HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js')}}
@stop


