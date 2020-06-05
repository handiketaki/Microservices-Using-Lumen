To execute the Lumen project please follow the steps below:

1. Go to the Gateway Project and start the service using the command:
	php -S localhost:8004 -t public
	
2. Go to the Login Project and start the service using the command:
	php -S localhost:8000 -t public
	
3. Go to the Registration Project and start the service using the command:
	php -S localhost:8001 -t public
	
4. Go to the Email Project and start the service using the command:
	php -S localhost:8002 -t public
	
5. Using Postman hit the post method of registeration service.
		URL: localhost:8004/register
		Method: POST
		Parameters: username, email, password, api_token(For Permissioning and Roles Verification)

6. Using Postman hit the post method of registeration service.
		URL: localhost:8004/login
		Method: POST
		Parameters: email, password
