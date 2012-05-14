## PasteVault - Email lives forever, passwords in email shouldn't

**Critical Note - PasteVault must be served over SSL. Even though it encrypts the text client side, without serving the javascript that does this over SSL it could be interfered with and expose the users data.**

PasteVault is an application to allow the creation of temporary text notes which are encrypted in browser and stored on a server with an expiration. A unique link is generated and that link can be shared for up to the expiration period. With the link, plus the password the text can be decoded. This is perfect for sending confidential information into a help desk or over email. Not using such a tool means your password, url, address, etc is stored forever in the help desk tool or email system.

### Installation

PasteVault works out of the box. To customize it for production create a "production" folder in /application/config/. You'll probably want to override the application config for your URL and application key. The session config should be overridden to set the _secure_ option to true for production.

The Laravel /storage directory must be writable

### Storage

PasteVault defaults to storing the texts via Laravel's Cache system to file. You could change this to MySQL or one of the other options via configuration.

### License

PasteVault is open-sourced software licensed under the MIT License.