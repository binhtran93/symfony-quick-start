### Manually Wiring Arguments

```yaml
# app/config/services.yml
parameters:
    admin_email: manager@example.com

services:
    # ... same as before

    AppBundle\Updates\SiteUpdateManager:
        arguments:
            $adminEmail: '%admin_email%'

```


### Choose a Specific Service
```yaml
# app/config/services.yml
services:
    # ... same code as before

    # explicitly configure the service
    AppBundle\Service\MessageGenerator:
        arguments:
            $logger: '@monolog.logger.request'

```

### Autoconfigure using tag, read more...

### Public Versus Private Services
You cannot access directly to service using container#get

### Explicitly Configuring Services and Arguments
```yaml
# app/config/services.yml
services:
    # ...

    # this is the service's id
    site_update_manager.superadmin:
        class: AppBundle\Updates\SiteUpdateManager
        # you CAN still use autowiring: we just want to show what it looks like without
        autowire: false
        # manually wire all arguments
        arguments:
            - '@AppBundle\Service\MessageGenerator'
            - '@mailer'
            - 'superadmin@example.com'

    site_update_manager.normal_users:
        class: AppBundle\Updates\SiteUpdateManager
        autowire: false
        arguments:
            - '@AppBundle\Service\MessageGenerator'
            - '@mailer'
            - 'contact@example.com'

    # Create an alias, so that - by default - if you type-hint SiteUpdateManager,
    # the site_update_manager.superadmin will be used
    AppBundle\Updates\SiteUpdateManager: '@site_update_manager.superadmin'

```