1. Created as symfony to demonstrate ability to use it.
- Opted not to use certain symfony components to demonstrate ability to build.
- This may seem like a contradiction, but I wanted to demonstrate range and good understanding of the concepts involved.


2. I use the word "verify" to name functions that don't return a value, they just throw an exception when non-compliant.

3. Decided to store account credentials in json text files for a) ease and b) because my CRM experience shows I can do databases and c) I wanted to do something distinctly distinct. Keep them out of the web root!

4. Reference the file formats in UserFactory so as not to have to update them in two places.

5. Check the username is valid upon load, to prevent directory traversal.

6. Do not check the password is valid upon load unless we subsequently change password standards.

7. On a production system it's beneficial to have different types of Exception, but for this that would feel like overkill.

8. Much of PHP style is personal preference. I am happy to use any style recommended, but I've been consistent throughout. I always put commas on the last item of the array as well.
This is part of the Drupal standards because if you add an entry you only change one line, not two!