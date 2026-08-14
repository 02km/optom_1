---
name: lfa-coding-agent
description: 'Run doctrine-driven LFA audits for AI coding agent work. Use for code generation reviews, agent task validation, multi-agent coordination, and agent output quality assurance.'
argument-hint: 'Task scope and trigger (code-review, agent-task, multi-agent, quality-assurance)'
user-invocable: true
---

# LFA Coding Agent Operating System

Apply a repeatable, lens-based audit workflow that verifies AI coding agent output quality, not just test pass status.

## When to Use

- You need confidence beyond green tests and clean lint/type checks for AI-generated code.
- You want severity-honest findings with explicit remediation proof for agent work.
- You need a structured audit before accepting AI-generated code or running agents.
- You need consistency checks for multi-agent workflows or complex agent tasks.
- You are about to commit or merge AI-generated code that touches shared logic, admin surfaces, pricing, checkout, product data, or cross-cutting UI.

## Inputs

- Task scope: specific file, module, feature, or full repo
- Trigger: `code-review`, `agent-task`, `multi-agent`, `quality-assurance`, or `pre-commit`
- Evidence location: where findings and verification notes should be saved
- Affected user/admin flows: the concrete screens, actions, tests, or routes that must still behave correctly
- Delivery intent: advisory audit only, pre-commit gate, or pre-push gate

## Decision Logic

1. Map trigger to operating mode:
- `code-review` -> focused review of AI-generated code with blast radius analysis
- `agent-task` -> single-agent task validation with pre/post verification
- `multi-agent` -> coordination audit across multiple agents with dependency mapping
- `quality-assurance` -> comprehensive QA of agent outputs with regression checks
- `pre-commit` -> gate audit before allowing commit of AI-generated changes

2. Build a blast-radius map before auditing.
- Include changed files from AI generation.
- Include direct imports/callers of changed shared modules.
- Include affected routes, hooks, server actions, tests, and admin/public consumers.
- Include schema/config surfaces when field names, pricing keys, or validation boundaries changed.
- Include agent-generated test files and their coverage.

3. Decide audit scope boundaries and list included paths.
4. Assign roles with separation per round:
- `Author` (AI agent), `Auditor` (human or different agent), `Remediator` (AI or human), `Verifier` (human or different agent).
- No person/agent can hold more than one role in the same round.

## Procedure

1. Establish audit contract.
- Record LFA-CA version, trigger, scope, blast radius, role assignments, evidence destination, and whether the audit blocks commit/push.
- Document the AI model, agent type, and generation parameters used.

2. Run Round 1 (Discover).
- Evaluate every file in scope through all LFA lenses.
- Start from AI-generated files, then walk outward to dependent code and runtime consumers.
- Produce structured findings with severity and rationale.
- Include why tests/lint/type checks could miss each issue.
- Mark each finding as `local`, `adjacent`, or `downstream` so regressions caused by shared changes are visible.

3. Publish a findings-first checkpoint (SILENT REASONING CONSTRAINT).
- **Perform all code greps, false-positive eliminations, and verification scoping internally.** Do not narrate iterative trial-and-error steps.
- Present only the verified, final scope of findings. Avoid repeating status summaries, code-check updates, or phrase-echoes across paragraphs.
- If acting as a gate, do not allow commit/push with unresolved CRITICAL, HIGH, or MEDIUM findings in scope.

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
13. Agent Output Quality (AI-specific lens)

## Required Checks For AI-Generated Code Audits

- Review the AI generation prompt and constraints used.
- Inspect the generated code for hallucinations, incorrect assumptions, or outdated patterns.
- Verify that all imports and dependencies are valid and up-to-date.
- Check that the generated code follows project conventions and architecture.
- Run at least one executable validation tied to the affected behavior, not just a full build.
- Treat a passing build as necessary but insufficient when AI-generated code touches shared contracts.
- Verify that AI-generated tests actually test the intended behavior.

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

## Commit And Push Gate

- If the trigger is `pre-commit` or `pre-push`, output a clear gate verdict: `BLOCK`, `CONDITIONAL PASS`, or `PASS`.
- `BLOCK` if any unresolved CRITICAL, HIGH, or MEDIUM finding remains in scope.
- `CONDITIONAL PASS` only when all findings are LOW and the residual risk is explicitly stated.
- `PASS` only when changed files, blast-radius consumers, and required validations are all covered by evidence.

## Severity Semantics

- `CRITICAL`: data exposure, security breach, financial/compliance harm, AI hallucination causing incorrect behavior.
- `HIGH`: production malfunction, corrupted state, silent failure, incorrect business logic.
- `MEDIUM`: latent defect, scaling trap, future instability, incomplete implementation.
- `LOW`: hygiene defects correlated with higher risk, minor style issues.

## Completion Checks

- Three rounds completed (minimum).
- Role separation respected for every round.
- No unresolved findings left in audit scope.
- Evidence package exists with findings, diffs, and verification notes.
- Build/tests rerun after final remediation.
- Blast-radius map exists and includes changed consumers and affected flows.
- Findings-first report was issued before commit/push when acting as a gate.

## Output Format & Anti-Bloat Rules

- **Zero Narrative Loops:** Never echo phrases like "let me check", "now I have the full picture", or repeat audit assessment summaries multiple times. Resolve all checks silently before outputting.
- `Audit Context`: trigger, mode, scope, version, AI model/agent info.
- `Blast Radius`: changed files, dependent consumers, affected flows, and validation targets.
- `Findings`: round-indexed, severity-ranked, file references, rationale.
- `Remediation`: fix summary mapped to finding IDs.
- `Verification`: test/build rerun results and final decision.
- `Gate Verdict`: `BLOCK`, `CONDITIONAL PASS`, or `PASS` with explicit rationale.

## References

- Doctrine and semantics: [LFA doctrine](./references/lfa-doctrine.md)
- LFA Audit OS: [lfa-audit-os](../lfa-audit-os/SKILL.md)