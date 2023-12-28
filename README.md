Goals
We are going to have a micro-service to keep all data of user wallet. 
We need to have two APIto expose them to other micro-services.

API Information:

1-get-balance:
This API should return a JSON to show current balance of a user. The parameter which is needed for this API is user_id and the output should be like the below sample:
		
		Input: 
			user_id int
		Output: 
			{"balance":4000}
2-add-money: 
This API should add money to wallet of a user and at the end return the transaction reference number.The parameter which is needed for this API is user_id and amount and the output should be like the below sample:

		Input: 
			user_id int 
			amount int (this parameter can be negative)
		Output: 
			{"reference_id":12312312312}