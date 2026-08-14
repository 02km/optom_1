# LFA Doctrine Reference

## Identity

- ID: LFA-CA
- Version: 1.0.0
- Status: Stable
- Scope: AI coding agent workflows

## Core Principle

Agent output quality is a global property. Passing tests are insufficient evidence. Confidence is earned through independent verification.

## Inviolable Assumptions

1. Passing tests do not imply correctness of AI-generated code.
2. AI-assisted code quality degrades with scope and complexity.
3. LOW severity findings are not optional.
4. Reviewer cannot be the author (even when author is an AI agent).
5. Independent verification is mandatory.
6. AI hallucinations can produce syntactically correct but semantically wrong code.

## Severity Definitions

- CRITICAL: Security/data/compliance/financial impact, AI hallucination causing incorrect behavior.
- HIGH: Production malfunction or silent failure, incorrect business logic.
- MEDIUM: Latent instability or scaling risk, incomplete implementation.
- LOW: Hygiene defects correlated with higher risk, minor style issues.

## Mandatory Review Structure

- Minimum 3 rounds:
  - Round 1: Discover defects.
  - Round 2: Verify fixes, catch regressions.
  - Round 3: Establish global confidence.
- Mandatory role separation each round:
  - Author, Auditor, Remediator, Verifier.
  - No person/agent can hold more than one role in the same round.

## Required Evidence

- Per round findings with severity and rationale.
- Why automated checks can miss each issue.
- Scoped diffs for every remediation.
- Verification notes and rerun build/tests.
- AI generation parameters and model info.

## Operating Modes

- Code review: focused review of AI-generated code with blast radius analysis.
- Agent task: single-agent task validation with pre/post verification.
- Multi-agent: coordination audit across multiple agents with dependency mapping.
- Quality assurance: comprehensive QA of agent outputs with regression checks.
- Pre-commit: gate audit before allowing commit of AI-generated changes.

## Agent Output Quality Lens

- **Correctness**: Does the code do what it claims to do?
- **Completeness**: Are all edge cases and error conditions handled?
- **Consistency**: Does it follow project patterns and conventions?
- **Safety**: Are there any security vulnerabilities or unsafe patterns?
- **Maintainability**: Is the code readable and well-structured?
- **Testability**: Can the code be easily tested?
- **Documentation**: Are comments and types clear and accurate?
- **Reusability**: Can the code be reused in other contexts without modification?
- **Performance**: Does the code meet performance requirements and avoid unnecessary overhead?
- **Scalability**: Can the code handle increased load or data volume without significant changes?
- **Accessibility**: Does the code follow accessibility best practices and standards?
- **UX/UI Integrity**: Does the code maintain a consistent and user-friendly interface and experience?
- **Error Handling**: Does the code gracefully handle errors and provide meaningful feedback to users and developers?
- **Minimalism**: Does the code avoid unnecessary complexity and bloat, focusing on essential functionality?

## Versioning

- MAJOR: doctrine/assumption changes.
- MINOR: lenses/procedure additions.
- PATCH: clarifications only.

## Final Gate

Branch does not merge until audit is clean and evidence is complete.