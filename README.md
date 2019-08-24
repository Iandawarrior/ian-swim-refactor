# ian-swim-refactor

My knowledge of laravel refactoring is limited, but I shall try to understand the refactoring as best as possible.

Segregated User database into its own file, and created api file under the route directory. 

User table has post function, hence able to see all neccesary attributes, however pets table does not, so all attributes must be acquired through request.