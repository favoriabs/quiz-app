# simple quiz-app

## Endpoints

### To register a user
> `api/v1/register`
Method: `post`
params
*first_name
*last_name
*email
*password
*profile_picture (note that this is in base64)

### response
`{
  code:100,
  user: {object},
  msg: 'user created successfully'
  }`

### User Login
> `api/v1/login`
Method: `post`
*params*
*email
*password

### response
`{
  status:'success',
  token: pcoksdnicscjcsoic8y8y33y83ygdbuccx973m
  }`
  
  ## social login
  > `api/v1/auth/{provider}`
  Ensure you pass in the provider parameter. e.g facebook or twitter. This must be a string.
  ### response
`{
  code:100,
  token: pcoksdnicscjcsoic8y8y33y83ygdbuccx973m
  }`
  
  > `api/v1/all/topics`
  Method: `get`
    ### response
`{
  code:100,
  topics: {object}
  }`
  
  > `api/v1/topics/{topicId}`
  `{
  code:100,
  question: {id: 1, 'How many states are in Nigeria?'}
  options: {id: 3, question_id: 1, is_correct: 0, answer: 36, id: 1, question_id: 1, is_correct: 1, answer: 34}
  }`
    
