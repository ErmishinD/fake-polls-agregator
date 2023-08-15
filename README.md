## Short description

This repository represents service to manage fake polls. User of the service must have ability to register an account and create any amount of polls with poll options (and set votes_count for each option). 

## API

API consists of one endpoint that can give information about random published poll that you have created. 

### Authorization

Before sending request you need to specify Auth-Token HTTP header.

To get your API key you need to need to have an account at [https://fake-polls-agregator.pp.ua](https://fake-polls-agregator.pp.ua). Then go to “Home” page and copy your key. 

### Endpoint

The endpoint URL: `/api/polls/random`

The HTTP Method: GET

### Example request

```bash
curl --location 'https://fake-polls.ermishin.pp.ua/api/polls/random' \
--header 'Auth-Token: ELkHlsxrqFDS0XcQzt3W'
```
