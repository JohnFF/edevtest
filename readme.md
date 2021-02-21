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

9. In a production system there would likely be two password regexes: one for dsallowed characters as well as allowed ones.

10. Use the validation rule constants from the engine for the interface as well by passing them as Twig variables. This ensures there are never discrepancis between front end and back end validation.
The other alterntive would be to use AJAX queries, but this is highly ineffiecient.

11. Use regexes only for character checks. Length checks are separate checks for granularity.

<<<<<<< HEAD
12. Electing not to include a password strength meter at this stage.
=======
12. Electing not to include a password strength meter at this stage.

13. Had originally planned to make all changes via AJAX on key presses, but to make this not spammable is hard to do in the time available.

14. For the time being, don't provide feedback to the user if the user is already taken. This could be easily added as a feature.
>>>>>>> feature/updateable_fields
