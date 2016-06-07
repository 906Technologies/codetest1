Alright here is a sample app I wrote up really quick it requires some polish and a new armor type.

Here is a list of things I would like you to add.

1. New armor type for shoulders and make sure that it can be equipped to your outfit.

2. Add validation that armor cannot be added unless it has a name and value.

3. Add validation that armor cannot be added with a value that is less then 0.

4. Add validation to make sure that armor cannot be added if it has the same name as other armor in existing inventory of the same armor type.

5. With the new constraints for adding inventory make sure that deleting inventory also takes into account the type you are deleting because currently deleting is by name, this will require you to send additional information like the type of the armor to the script.

We are not necessarily looking for perfect solutions, just that you are able to identify issues and work within a system to fix the problem.

Create a github pull request to the repository when you believe you have accomplished these tasks.