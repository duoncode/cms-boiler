# Changelog

## [Unreleased](https://github.com/duonrun/cms-boiler/compare/0.1.0...HEAD)

### Breaking

- Renamed `whitelist` to `trusted` in the public API:
  - `Duon\Cms\Boiler\Renderer::__construct()` named argument `trusted`
  - `Duon\Cms\Boiler\Error\Renderer::__construct()` named argument `trusted`
  - `Duon\Cms\Boiler\Error\RendererFactory::__construct()` named argument `trusted`
  - `Duon\Cms\Boiler\Error\Handler::whitelist()` was renamed to `trusted()`

### Changed

- Updated integration to `duon/boiler` `v0.3.0`.
- Switched renderer internals to Boiler `Engine::create()` / `Engine::unescaped()`.

### Fixed

- Updated the default trusted classes in `Error\Handler` to use `Duon\Cms\Cms` instead of the removed `Duon\Cms\Finder\Finder` class.

## [0.1.0](https://github.com/duonrun/cms-boiler/releases/tag/0.1.0) (2026-01-31)

Initial release.

### Added

- Boiler templates for Duon CMS admin panel and frontend rendering
- Template components for common CMS UI patterns
