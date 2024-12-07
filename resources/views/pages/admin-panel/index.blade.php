<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css"
    rel="stylesheet">
  @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body>
    <div id="editor">
        <h2>Demo Content</h2>
        <p>Preset build with <code>snow</code> theme, and some common formats.</p>
      </div>
      

  <script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });
  </script>
</body>

</html>
