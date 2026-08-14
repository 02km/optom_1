---
name: lfa-audit-os
description: 'Run doctrine-driven LFA audits for global code correctness. Use for launch readiness, major feature audits, changed-files quality scans, multi-round verification, severity-ranked findings, and audit evidence generation.'
argument-hint: 'Audit target and trigger (launch, major feature, sprint, or rescan)'
user-invocable: true
---

# LFA Audit Operating System

Apply a repeatable, lens-based audit workflow that verifies global correctness, not just local test pass status.

## When to Use

- You need confidence beyond green tests and clean lint/type checks.
- You want severity-honest findings with explicit remediation proof.
- You need a structured audit before release or merge.
- You need consistency checks for AI-assisted or fast-moving code changes.
- You are about to commit or push changes that touch shared logic, admin surfaces, pricing, checkout, product data, or cross-cutting UI.

## Inputs

- Audit target scope: full repo, domain folder, or changed files.
- Trigger: `production-launch`, `major-feature`, `regular-sprint`, or `extended-without-review`.
- Evidence location: where findings and verification notes should be saved.
- Affected user/admin flows: the concrete screens, actions, tests, or routes that must still behave correctly.
- Delivery intent: advisory audit only, pre-commit gate, or pre-push gate.

## Decision Logic

1. Map trigger to operating mode:

- `production-launch` -> full 3-round audit across all files.
- `major-feature` -> domain-scoped audit plus dependent/downstream areas, changed consumers, and affected user flows.
- `regular-sprint` -> changed-files scan plus one-hop dependencies, shared consumers, and touched runtime flows.
- `extended-without-review` -> full repo re-scan.

2. Build a blast-radius map before auditing.

- Include changed files.
- Include direct imports/callers of changed shared modules.
- Include affected routes, hooks, server actions, tests, and admin/public consumers.
- Include schema/config surfaces when field names, pricing keys, or validation boundaries changed.

3. Decide audit scope boundaries and list included paths.
4. Assign roles with separation per round:

- `Author`, `Auditor`, `Remediator`, `Verifier`.
- No person/agent can hold more than one role in the same round.

## Procedure

1. Establish audit contract.

- Record LFA-OS version, trigger, scope, blast radius, role assignments, evidence destination, and whether the audit blocks commit/push.

2. Run Round 1 (Discover).

- Evaluate every file in scope through all LFA lenses.
- Start from changed files, then walk outward to dependent code and runtime consumers.
- Produce structured findings with severity and rationale.
- Include why tests/lint/type checks could miss each issue.
- Mark each finding as `local`, `adjacent`, or `downstream` so regressions caused by shared changes are visible.

3. Publish a findings-first checkpoint.

- Report findings before remediation or commit/push.
- If the audit is acting as a gate, do not allow commit/push with unresolved CRITICAL, HIGH, or MEDIUM findings in scope.

4. Remediate Round 1 findings.

- Fix CRITICAL, HIGH, MEDIUM, and LOW findings in-scope.
- LOW findings are not deferred.
- Prefer root-cause fixes over local symptom patches when the changed file is a shared abstraction.

5. Run Round 2 (Verify + Regression Catch).

- Re-check all fixed areas and adjacent systems for regression.
- Re-run the narrowest behavior-scoped validation for each affected flow before widening.
- Check downstream consumers that were not directly edited but depend on changed shared fields, props, schemas, or pricing logic.
- Confirm severity downgrades only with explicit evidence.

6. Remediate Round 2 findings.

- Apply scoped diffs and verification notes.

7. Run Round 3 (Global Confidence).

- Confirm system-level consistency, invariants, and no unresolved findings.
- Confirm no commit/push gate is being bypassed due to "build passed" alone.
- Re-run required build and tests as final confidence gate.

8. Publish audit evidence.

- Findings by round and severity.
- Scoped diffs mapped to findings.
- Verification logs and pass/fail conclusion.
- Explicit ship/no-ship recommendation.

## Lenses (Always Apply)

1. Security
2. Type Safety
3. Boundary Validation
4. Error Handling
5. Business Logic
6. Domain Consistency
7. Console/Logging Hygiene
8. Dead Code
9. Race Conditions
10. Accessibility
11. Performance
12. UX/UI Integrity

## Required Checks For Changed-File Audits

- Review the diff and changed files first, then inspect at least one layer outward for each shared abstraction change.
- For UI/admin changes, inspect both the editing surface and the runtime consumer surface.
- For pricing/schema/config changes, inspect all readers/writers of the changed fields, not just the edited component.
- Run at least one executable validation tied to the affected behavior, not just a full build.
- Treat a passing build as necessary but insufficient when shared contracts changed.

## Commit And Push Gate

- If the trigger is `major-feature` or the delivery intent is `pre-commit` or `pre-push`, output a clear gate verdict: `BLOCK`, `CONDITIONAL PASS`, or `PASS`.
- `BLOCK` if any unresolved CRITICAL, HIGH, or MEDIUM finding remains in scope.
- `CONDITIONAL PASS` only when all findings are LOW and the residual risk is explicitly stated.
- `PASS` only when changed files, blast-radius consumers, and required validations are all covered by evidence.

## Severity Semantics

- `CRITICAL`: data exposure, security breach, financial/compliance harm.
- `HIGH`: production malfunction, corrupted state, silent failure.
- `MEDIUM`: latent defect, scaling trap, future instability.
- `LOW`: hygiene defects correlated with higher risk.

## Completion Checks

- Three rounds completed (minimum).
- Role separation respected for every round.
- No unresolved findings left in audit scope.
- Evidence package exists with findings, diffs, and verification notes.
- Build/tests rerun after final remediation.
- Blast-radius map exists and includes changed consumers and affected flows.
- Findings-first report was issued before commit/push when acting as a gate.

## Output Format

- `Audit Context`: trigger, mode, scope, version.
- `Blast Radius`: changed files, dependent consumers, affected flows, and validation targets.
- `Findings`: round-indexed, severity-ranked, file references, rationale.
- `Remediation`: fix summary mapped to finding IDs.
- `Verification`: test/build rerun results and final decision.
- `Gate Verdict`: `BLOCK`, `CONDITIONAL PASS`, or `PASS` with explicit rationale.

## References

- Doctrine and semantics: [LFA doctrine](./references/lfa-doctrine.md)
