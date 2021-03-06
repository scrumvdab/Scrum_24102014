<?php

class ForumComment extends Eloquent {

    protected $table = 'forum_comments';

    public function group() {
        $this->belongsTo('ForumGroup');
    }

    public function category() {
        $this->belongsTo('ForumCategory');
    }

    public function thread() {
        $this->belongsTo('ForumThread');
    }
     
    public function replies() {
        return $this->hasMany('ForumReply', 'comment_id');
    }
    
    public function repliesreplies() {
        return $this->hasMany('ForumReplyReply', 'comment_id');
    }

    public function author() {
        return $this->belongsTo('User');
    }
}
