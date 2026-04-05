# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

A minimal PHP library providing shared data transfer objects (DTOs) for the Luft.jetzt ecosystem. Contains the core `Station` and `Value` models used by all providers and the API bundle.

- **Type**: Library (no framework, no dependencies beyond PHP)
- **Namespace**: `Caldera\LuftModel`
- **PHP**: ^8.3

## Models

### `Model\Station`

Represents an air quality monitoring station:
- `stationCode` (string) — Unique station identifier
- `ubaStationId` (int) — Official UBA station ID
- `title`, `cityName` — Station name and city
- `latitude`, `longitude` — Geographic coordinates
- `fromDate`, `untilDate` — Operational period
- `altitude` (int, nullable) — Elevation in meters
- `stationType`, `areaType` — Classification enums
- `provider`, `network` — Data source metadata

### `Model\Value`

Represents a single air quality measurement:
- `stationCode` (string) — Reference to measuring station
- `dateTime` (DateTime) — Timestamp of measurement
- `value` (float) — Measured concentration
- `pollutant` (string) — Pollutant name (e.g., pm10, no2, o3)
- `tag` (string, nullable) — Optional classification tag

## Design Patterns

- All properties are nullable with fluent setter interface (`return $this`)
- Pure DTOs — no business logic, no validation
- Strict types throughout (`declare(strict_types=1)`)
- Zero external dependencies

## Common Commands

```bash
composer install   # Install (no dependencies to install)
```
