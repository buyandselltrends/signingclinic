<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode('ims_enterprise_dashboard', 'ims_render_dashboard');

function ims_render_dashboard() {
    ob_start();
    ?>
    <div class="ims-app-container">
        <!-- Sidebar -->
        <aside class="ims-sidebar">
            <div class="ims-brand">
                <div class="ims-logo">🏢</div>
                <div>
                    <strong>Enterprise Portal</strong>
                    <span class="ims-badge">Pro Plan</span>
                </div>
            </div>
            
            <nav class="ims-nav">
                <div class="ims-nav-item active" data-target="overview">📊 Dashboard</div>
                <div class="ims-nav-item" data-target="requests">📋 All Requests</div>
                <div class="ims-nav-item" data-target="scheduling">📅 Scheduling</div>
                <div class="ims-nav-item" data-target="team">👥 Team Members</div>
                <div class="ims-nav-item" data-target="rates">💰 Rate Management</div>
                <div class="ims-nav-item" data-target="billing">🧾 Billing & Invoices</div>
                <div class="ims-nav-item" data-target="reports">📈 Analytics</div>
            </nav>

            <div class="ims-sidebar-footer">
                <div class="ims-sub-details">
                    <p><strong>Current Plan:</strong><br>$199/mo (Enterprise)</p>
                    <button class="ims-btn-small">Manage Subscription</button>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ims-main">
            <!-- Header -->
            <header class="ims-header">
                <h2>Acme Corp Workspace</h2>
                <div class="ims-header-actions">
                    <button class="ims-btn ims-btn-primary">+ New Request</button>
                </div>
            </header>

            <!-- Panels -->
            <div class="ims-panels">
                
                <!-- Overview Panel -->
                <div id="ims-panel-overview" class="ims-panel active">
                    <div class="ims-stats-grid">
                        <div class="ims-stat-card">
                            <div class="ims-stat-title">Active Requests</div>
                            <div class="ims-stat-val">12</div>
                        </div>
                        <div class="ims-stat-card">
                            <div class="ims-stat-title">Total Spend (MTD)</div>
                            <div class="ims-stat-val">$3,450</div>
                        </div>
                        <div class="ims-stat-card">
                            <div class="ims-stat-title">Team Members</div>
                            <div class="ims-stat-val">8</div>
                        </div>
                        <div class="ims-stat-card">
                            <div class="ims-stat-title">Hours Interpreted</div>
                            <div class="ims-stat-val">42h</div>
                        </div>
                    </div>

                    <h3>Recent Requests</h3>
                    <table class="ims-table">
                        <thead><tr><th>ID</th><th>Service</th><th>Requested By</th><th>Date</th><th>Status</th></tr></thead>
                        <tbody>
                            <tr><td>#REQ-802</td><td>VRI (Japanese)</td><td>Sarah Connor</td><td>Oct 12, 2026</td><td><span class="ims-tag ims-tag-blue">Scheduled</span></td></tr>
                            <tr><td>#REQ-801</td><td>Doc Translation</td><td>John Smith</td><td>Oct 11, 2026</td><td><span class="ims-tag ims-tag-green">Completed</span></td></tr>
                            <tr><td>#REQ-800</td><td>OPI (Spanish)</td><td>Sarah Connor</td><td>Oct 10, 2026</td><td><span class="ims-tag ims-tag-green">Completed</span></td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- Team Panel -->
                <div id="ims-panel-team" class="ims-panel">
                    <div class="ims-panel-header">
                        <h3>Team Management</h3>
                        <button class="ims-btn">Invite Member</button>
                    </div>
                    <table class="ims-table">
                        <thead><tr><th>User</th><th>Role</th><th>Department</th><th>Usage (MTD)</th><th>Action</th></tr></thead>
                        <tbody>
                            <tr><td><strong>Sarah Connor</strong><br><small>sarah@acme.com</small></td><td>Admin</td><td>Operations</td><td>$1,200</td><td><button class="ims-btn-small">Edit</button></td></tr>
                            <tr><td><strong>John Smith</strong><br><small>john@acme.com</small></td><td>Manager</td><td>Engineering</td><td>$450</td><td><button class="ims-btn-small">Edit</button></td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- Rates Panel -->
                <div id="ims-panel-rates" class="ims-panel">
                    <h3>Negotiated Rate Management</h3>
                    <p class="ims-text-muted">Your Enterprise plan includes custom rate cards.</p>
                    <div class="ims-rates-grid">
                        <div class="ims-rate-card">
                            <h4>Standard Translation</h4>
                            <div class="ims-rate-price">$0.12 <span>/ word</span></div>
                            <p>Global baseline rate lock.</p>
                        </div>
                        <div class="ims-rate-card">
                            <h4>VRI (Video Interpreting)</h4>
                            <div class="ims-rate-price">$1.50 <span>/ min</span></div>
                            <p>Discounted from $1.80.</p>
                        </div>
                        <div class="ims-rate-card">
                            <h4>OPI (Phone)</h4>
                            <div class="ims-rate-price">$1.10 <span>/ min</span></div>
                            <p>Priority routing enabled.</p>
                        </div>
                    </div>
                </div>

                <!-- Billing Panel -->
                <div id="ims-panel-billing" class="ims-panel">
                    <div class="ims-panel-header">
                        <h3>Billing & Invoices</h3>
                        <button class="ims-btn">Download September Invoice</button>
                    </div>
                    <div class="ims-invoice-list">
                        <div class="ims-invoice-item">
                            <div>
                                <strong>Invoice #INV-2026-09</strong>
                                <p style="margin:2px 0 0; font-size:12px; color:#64748b;">Issued: Oct 1, 2026 • Due: Oct 15, 2026</p>
                            </div>
                            <div style="text-align:right;">
                                <strong>$4,250.00</strong>
                                <br><span class="ims-tag ims-tag-yellow" style="margin-top:4px;">Pending</span>
                            </div>
                        </div>
                        <div class="ims-invoice-item">
                            <div>
                                <strong>Invoice #INV-2026-08</strong>
                                <p style="margin:2px 0 0; font-size:12px; color:#64748b;">Issued: Sep 1, 2026 • Paid via ACH</p>
                            </div>
                            <div style="text-align:right;">
                                <strong>$3,800.00</strong>
                                <br><span class="ims-tag ims-tag-green" style="margin-top:4px;">Paid</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scheduling Panel -->
                <div id="ims-panel-scheduling" class="ims-panel">
                    <h3>Enterprise Scheduling</h3>
                    <p class="ims-text-muted">Manage recurring shifts and bulk scheduling for on-site interpreters.</p>
                    <div class="ims-empty-state">
                        <div style="font-size: 40px; margin-bottom:10px;">📅</div>
                        <h4>No bulk schedules active.</h4>
                        <button class="ims-btn" style="margin-top:10px;">Create Schedule Matrix</button>
                    </div>
                </div>
                
                <!-- Reports Panel -->
                <div id="ims-panel-reports" class="ims-panel">
                    <h3>Analytics & Reporting</h3>
                    <div class="ims-chart-placeholder">
                        <p>Bar Chart: Spend by Department (October)</p>
                        <div style="display:flex; align-items:flex-end; gap:20px; height: 150px; justify-content:center; margin-top:20px;">
                            <div style="width:40px; background:#4f46e5; height: 100%;"></div>
                            <div style="width:40px; background:#818cf8; height: 60%;"></div>
                            <div style="width:40px; background:#c7d2fe; height: 30%;"></div>
                            <div style="width:40px; background:#e0e7ff; height: 80%;"></div>
                        </div>
                    </div>
                    <button class="ims-btn" style="margin-top:20px;">Export CSV</button>
                </div>

                <div id="ims-panel-requests" class="ims-panel">
                    <h3>All Requests Ledger</h3>
                    <p>Complete historical ledger of all cross-company requests.</p>
                    <table class="ims-table">
                        <thead><tr><th>ID</th><th>Service</th><th>Target</th><th>Cost</th><th>Status</th></tr></thead>
                        <tbody>
                            <tr><td>#REQ-802</td><td>VRI</td><td>Japanese</td><td>Accruing</td><td>Active</td></tr>
                            <tr><td>#REQ-801</td><td>Text</td><td>French</td><td>$14.50</td><td>Complete</td></tr>
                            <tr><td>#REQ-800</td><td>OPI</td><td>Spanish</td><td>$44.00</td><td>Complete</td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </main>
    </div>
    <?php
    return ob_get_clean();
}
