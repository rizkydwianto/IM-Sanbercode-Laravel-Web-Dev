<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Html</title>
  </head>
  <body>
    <h1>Buat Account Baru!</h1>
    <a href="register.blade.php"></a>
    <h3>Sign Up From</h3>
    <form action="home" method="post">
@csrf

      <label>First name:</label><br /><br />
      <input type="text" name="namadepan" id="" /><br /><br />
      <label>Last name:</label><br /><br />
      <input type="text" name="namabelakang" id="" /><br /><br />
      <label>Gender:</label><br /><br />
      <input type="radio" name="jeniskelamin" value="1" />Male <br />
      <input type="radio" name="jeniskelamin" value="2" />Female <br />
      <input type="radio" name="jeniskelamin" name="3" />Other <br /><br />
      <label>Nationality:</label><br /><br />
      <select>
        <option>Indonesia</option>
        <option>Palestina</option>
        <option>Iran</option>
      </select>
      <br /><br />
      <label>Language Spoken:</label><br /><br />
      <input type="checkbox" name="" />Bahasa Indonesia <br />
      <input type="checkbox" name="" />English <br />
      <input type="checkbox" name="" />Other <br /><br />
      <label>Bio:</label><br /><br />
      <textarea name="bio" cols="30" rows="10"></textarea><br />
      <input type="submit" name="" value="SignUp" />
    </form>
  </body>
</html>
