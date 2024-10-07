<!DOCTYPE html>
<html lang = "fr">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "/CSS/style.css">
    <title> New annonce </title>
</head>
<body>
    <section>
        <h1> New annonce </h1>
        <form action = "{{ route('store') }}" method = "post">
        @csrf
            <label for = "title"> Title </label>
            <input type = "text" name = "title" id = "title" class = "block mt-1 w-full" required>
            <label for = "description"> Description </label>
            <textarea name = "description" id = "description" class = "block mt-1 w-full" required cols = "30" rows = "10"></textarea>
            <label for = "photo"> Image </label>
            <input type = "file" name = "photo" id = "photo" class = "block mt-1 w-full" accept = "image/png, image/jpeg, image/jpg" multiple required>
            <div class = "flex">
            <label for = "price"> Price </label>
            <input type = "text" name = "price" id = "price" class = "block mt-1 w-full" required>
            <p> € </p>
            </div>
            <button type = "submit" name = "add" id = "add"> Add </button>
        </form>
    </section>
</body>
</html>