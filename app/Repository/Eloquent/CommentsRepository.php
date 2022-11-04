<?php

namespace App\Repository\Eloquent;

use App\Models\BlogPosts;
use App\Repository\CommentsRepositoryInterface;
use App\Repository\PostsRepositoryInterface;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class CommentsRepository implements CommentsRepositoryInterface
{

    private PostsRepositoryInterface $postsRepository;

    public function __construct(PostsRepositoryInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }


    public function getComments($id)
    {
        $post = $this->postsRepository->getbyId($id);
        if ($post) {
            $comments = $post->comments()->active()->get();
            $data = [];
            foreach ($comments as $comment) {
                $data[] = [
                    'id' => $comment->id,
                    'name' => $comment->user->name,
                    'comment' => $comment->body,
                    'created_at' => $comment->created_at->translatedFormat('d F Y'),
                ];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function createComment($data)
    {
        $post = $this->postsRepository->getbyId($data['post_id']);
        if ($post) {
            $post->comments()->create([
                'body' => $data['body'],
                'user_id' => auth()->user()->id,
            ]);
           return true;
        } else {
            return false;
        }
    }

    public function updateComment($id, $data)
    {
        // TODO: Implement updateComment() method.
    }

    public function deleteComment($id)
    {
        // TODO: Implement deleteComment() method.
    }
}
