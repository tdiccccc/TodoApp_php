<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>TodoList</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/9b2d8a1ff7.js" crossorigin="anonymous"></script>
</head>
<body>
  <h1>TodoList</h1>
  <form action="" method="POST">
    <div>
      <div>
        <label for="">タスク名</label>
        <input type="text" name="todo-name">
        <input type="submit" value="追加する" name="submitButton">
      </div>
      <section>
        <article>
          <div>
            <div>
              <p class="todoName"></p>
              <button><i class="fa-solid fa-check"></i></button>
              <button><i class="fa-solid fa-trash-can"></i></button>
            </div>
          </div>
        </article>
      </section>
    </div>
  </form>
</body>
</html>