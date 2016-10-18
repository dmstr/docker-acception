include Makefile.base

all:	 ##@test [TEST] shorthand for
	$(MAKE) up run-tests

bash:	 ##@development open application development bash
	$(DOCKER_COMPOSE) run --rm --entrypoint bash codecept

run-tests:	 ##@test run tests
	$(DOCKER_COMPOSE) run codecept run -x optional -vv --html=_report.html

open-vnc:	 ##@test open application database service in browser
	$(OPEN_CMD) vnc://x:secret@$(DOCKER_HOST_IP):$(shell $(DOCKER_COMPOSE) port firefox 5900 | sed 's/[0-9.]*://')
	$(OPEN_CMD) vnc://x:secret@$(DOCKER_HOST_IP):$(shell $(DOCKER_COMPOSE) port chrome 5900 | sed 's/[0-9.]*://')

open-report: ##@test open HTML reports
	$(OPEN_CMD) tests/_output/_report.html
	$(OPEN_CMD) tests/_output
