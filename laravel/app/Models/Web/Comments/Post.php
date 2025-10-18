<?php

namespace App\Models\Web\Comments;

class Post
{
    public Comment $comment;
    public String $ip;
    public String $user_agent;
    public String $body;
    public String $code;

    public function setCode()
    {
        $this->code = md5(sprintf('%s::%s', $this->user_agent, $this->ip));
    }
}
