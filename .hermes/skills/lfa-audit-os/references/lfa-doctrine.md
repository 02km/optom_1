# LFA Doctrine Reference

## Identity

- ID: LFA-OS
- Version: 1.0.0
- Status: Stable
- Scope: Any production-bound codebase

## Core Principle

Correctness is a global property. Passing tests are insufficient evidence. Confidence is earned through independent verification.

## Inviolable Assumptions

1. Passing tests do not imply correctness.
2. AI-assisted code quality degrades with scope.
3. LOW severity findings are not optional.
4. Reviewer cannot be the author.
5. Independent verification is mandatory.

## Severity Definitions

- CRITICAL: Security/data/compliance/financial impact.
- HIGH: Production malfunction or silent failure.
- MEDIUM: Latent instability or scaling risk.
- LOW: Hygiene signals around risk surfaces.

## Mandatory Review Structure

- Minimum 3 rounds:
  - Round 1: Discover defects.
  - Round 2: Verify fixes, catch regressions.
  - Round 3: Establish global confidence.
- Mandatory role separation each round:
  - Author, Auditor, Remediator, Verifier.

## Required Evidence

- Per round findings with severity and rationale.
- Why automated checks can miss each issue.
- Scoped diffs for every remediation.
- Verification notes and rerun build/tests.

## Operating Modes

- Production launch: full 3-round all-file audit.
- Major feature: domain plus downstream scope.
- Regular sprint: changed-files scan.
- Extended gap: full re-scan.

## Versioning

- MAJOR: doctrine/assumption changes.
- MINOR: lenses/procedure additions.
- PATCH: clarifications only.

## Final Gate

Branch does not merge until audit is clean and evidence is complete.
