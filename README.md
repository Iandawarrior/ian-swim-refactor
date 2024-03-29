# ian-swim-refactor

My knowledge of laravel refactoring is limited, but I shall try to understand the refactoring as best as possible.

Segregated User database into its own file, and created api file under the route directory. (First Commit)

User table has post function, hence able to see all neccesary attributes, however pets table does not, so all attributes must be acquired through request. (Second Commit)

Ignore previous gibberish, after compressing a 20 hour php refresher course into 7 hours, and another 5 hours spent studying the laravel framework, everything seems a bit less complex to me. Added composer installation to index.php, also will add an option to optimise routing during deployment using the artisan framework. While this is only supposed to be used when there is a large number of route requests, this program might progress to that stage one day, for now the code shall be commented out.(Third Commit)

Segregated Routes into individual files for greater readability.(4th Commit)

Added some reasoning and renamed a route file after better understanding.(5th Commit)

Isolated getUserById functionality into a function to be able to be reused in another class. Renamed getUserById and getPetsFavFood routes.(6th Commit)

Segregated getAllUsers into unsetting password for all users and joining their names into a single string.(7th Commit)

Optimised deletePet by printing validation pet exists before deleting as well as removing unused argument.(8th Commit) 

Moved all Database code to the database.php file and encapsulated them in functions for better readability as well as added header comments to all files(9th Commit)

Added returns to all comments in files and deleted copy of original file from public folder(10th Commit)

Now I have compartmentalised the code, I will now begin refactoring it Laravelly by adding the MVC architecture.
More specifically, I have added the UsersController.php file to handle all the incoming requests.(11th Commit)

Now as all developers do, I have realised the first 80 percent of my refactoring is absolute rubbish so I am going to clear it all up. Also added some reasoning to the Controlles(12th Commit)

-------------------------------------------------------------------------------------------------------------
2nd Attempt

Had the right idea initially, but with poor execution, have generated the migrations necessary to build or delete the tables. The documentation advocates for avoiding the model folder because they feel models are too ambiguous. That being said, the models have been placed in the app folder to help better define the classes.(13th Commit)

Fixed the UsersController classes and added models, granted they are quite barren, due to the fact that the migration folder contains the blueprint to build the tables already(14th Commit)

Updated Model classes for neccesary relationships between models and bugfixed UsersController(15th Commit)

Finished refactoring PetFoodsController and added some keys to the tables under migrations(16th Commit)

Finished refactoring PetsController and moved all the extra files to redundant folder. Refactoring complete.(17th Commit)