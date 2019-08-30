# ian-swim-refactor

My knowledge of laravel refactoring is limited, but I shall try to understand the refactoring as best as possible.

Segregated User database into its own file, and created api file under the route directory. (First Commit)

User table has post function, hence able to see all neccesary attributes, however pets table does not, so all attributes must be acquired through request. (Second Commit)

Ignore previous gibberish, after compressing a 20 hour php refresher course into 7 hours, and another 5 hours spent studying the laravel framework, everything seems a bit less complex to me. Added composer installation to index.php, also will add an option to optimise routing during deployment using the artisan framework. While this is only supposed to be used when there is a large number of route requests, this program might progress to that stage one day, for now the code shall be commented out.(Third Commit)

Segregated Routes into individual files for greater readability.(4th Commit)

Added some reasoning and renamed a route file after better understanding.(5th Commit)

Isolated getUserById functionality into a function to be able to be reused in another class. Renamed getUserById and getPetsFavFood routes.(6th Commit)

Segregated getAllUsers into unsetting password for all users and joining their names into a single string.(7th Commit)