# Revisions
Revisions is a [Grav](https://github.com/getgrav/grav) plugin creates simple page revisions by putting a timestamped copy of the page in a revisions folder in the page's path.

## Installation
```$ bin/gpm install revisions```

## Configuration
Currently none.

## Usage
Revisions automaticly creates timestamped copies of the current requested page in a revisions directory. This only happens when the cache for that page has expired and the content has changed since the last revision was created.

### Roadmap
This is only a first pass. Planned features:
* Integration with [Admin](https://github.com/getgrav/grav-plugin-admin)
* Configuration options
* Display revision differences via [Admin](https://github.com/getgrav/grav-plugin-admin)
* Ability to revert to previous revisions via [Admin](https://github.com/getgrav/grav-plugin-admin)
* Image and file revision support
