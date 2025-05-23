<?php ?>

body {
    letter-spacing: 0.0625rem !important;
}

.dr-navbar-head {
    height: 3.5rem !important;
    box-sizing: border-box !important;
    font-weight: bold !important;
    font-size: 1.5rem !important;
    color: #6c757d !important; /* Bootstrap's btn-secondary color */
}

.dr-navbar-item {
    height: 3.5rem !important;
    box-sizing: border-box !important;
    font-weight: bold !important;
    font-size: 1rem !important;
}

.dr-navbar-item:hover {
    background-color: rgba(230, 230, 230, 0.6) !important;
}

.dr-shadow {
    box-shadow: 0 0.5rem 1.0rem rgba(0, 0, 0, 0.2) !important;
}

.dr-btn-table {
    position: relative; 
    z-index: 1;
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.4) !important;
}

.dr-tag {
    display: inline-block !important;
    text-align: center !important;
    padding-inline: 0.75rem !important;
    padding-top: 0.375rem !important;
    padding-bottom: 0.375rem !important;
    border-radius: 0.375rem !important;
    font-weight: bold !important;
}

.dr-border-top {
    border-top: 1px solid rgb(222, 226, 230) !important;
}

.table thead.dr-header-success {
    --bs-table-bg: #198754; /* Bootstrap's success green */
    --bs-table-color: white;
}

.table thead.dr-header-warning {
    --bs-table-bg: #ffc107; /* Bootstrap's warning yellow */
    --bs-table-color: white;
}

.table tbody tr:nth-of-type(odd) {
    --bs-table-striped-bg: #f8f9fa; /* Bootstrap's bg-light color for subtle striping */
}

.dr-status-open {
    color: #198754;
    background-color: #d1e7dd;
    border: 1px solid #d1e7dd;
}

.dr-status-in_progress {
    color: #22ced4;
    background-color: #d1eff0;
    border: 1px solid #d1eff0;
}

.dr-status-on_hold {
    color: #ffc107;
    background-color: #fff3cd;
    border: 1px solid #fff3cd;
}

.dr-status-completed {
    color: #0d6efd;
    background-color: #e7f1ff;
    border: 1px solid #e7f1ff;
}

.dr-status-finalized {
    color: #7d0dfd;
    background-color: #f2e7ff;
    border: 1px solid #f2e7ff;
}

.dr-status-cancelled {
    color: #dc3545;
    background-color: #f8d7da;
    border: 1px solid #f8d7da;
}