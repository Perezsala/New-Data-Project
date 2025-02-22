# Database Management System Project 

---

## ❖・Introduction・❖

* Separating the content in those flat relations into separate relations (yes);
* Establishing relationships between those relations(yes);
* Adding key constraints(yes);
* Drawing out the relationships between those relations using the ER model; and,
* Adding an interactive layer using HTML forms and PHP.

In essence, you’re creating an elaborate, MVC-based application of assignment 2 using a WAMP/MAMP stack.

---

## ❖・Requirements・❖

The database should handle the following operations, all via HTML forms:

* **Search** every entry in the database, wrapping the result in a table. If the search fails, indicate this to the user.
* **Update** any column/attribute using another distinct column/attribute as a pattern match.
* **Insert** new entries into the database. Each new entry should accept site/app name, URL, email address, username, password, and a comment. The comment field in the HTML form should use the HTML [`textarea`](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/textarea) element in lieu of the `input` element.
* **Delete** an entry from the database based on a pattern match with another distinct column/attribute.

Include a button — prominently placed — that adds the ability to refresh the page, in effect, clearing the results.

---

## ❖・Rules・❖

* Paths used in any of the HTML or PHP files must be relative; no absolute paths.
* The database name must be `student_passwords`.
* The database username must be `passwords_user`. The password you create does not matter, but must be included in `mysql/setup.sql`.
* The commands to create the database and the user should be included in `mysql/setup.sql`. Standing up the database must be done via the command `source setup.sql`.
* You must ensure that the name of your ER model image is one of either `er-model.jpg`, `er-model.png`, or, `er-model.pdf`. No other file name or type is allowed. Also note that the file may not be larger than 1MB. Use an image editor, such as [GIMP](https://www.gimp.org/), if you need to further reduce the file size of your image.
* Your ER model image must be placed in the included `entity-relationship-model` folder.
* `php/config.php` should contain the database credentials required for the user to log in. These credentials should also be included in `mysql/setup.sql`.
* `php/helpers.php` should contain functions requiring interactions with the database. In previous examples, this file has been called `db.php`.
* Do not edit any of the `.gitignore` files.
* Do not add more files to this repo; all files required for this project are already included. If you must add one or more files, because you found an error in this assignment’s scaffold, first ask on our class’ Microsoft Group so everyone is aware of the mistake.
* You must use EditorConfig, per the included `.editorconfig` file.

