<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @auth
    <p>Congrats tou are logged in.</p>
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>

    <div style="border: 3px solid black;">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post title">
            <textarea name="body" placeholder="Body content..."></textarea>
            <button>Create Post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach ($posts as $post)
        <div style="background-color: gray; margin: 10px; padding: 10px;">
            <h3>{{ $post->title }} by {{ $post->user->name }}</h3>
            <p>{{ $post->body }}</p>
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>

    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Log in</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginname" placeholder="name">
            <input type="password" name="loginpassword" placeholder="password">
            <button>Log in</button>
        </form>
    </div>
    @endauth
</body>

</html>