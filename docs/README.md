## Build trigger     
     
    curl -X POST \
         -F token=XXXXX \
         -F "ref=master" \
         -F "variables[TEST_URL]=XXXXXX" \
         https://git.hrzg.de/api/v3/projects/376/trigger/builds

     