<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <title>لوحة التحكم</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; font-family: "Tajawal", sans-serif; }
    .sidebar { height: 100vh; background: #212529; color: white; padding: 20px; position: fixed; top: 0; left: 0; width: 220px; transition: margin 0.3s; z-index:1050; }
    .sidebar h4 { color: #ffc107; }
    .sidebar a { display: block; color: #adb5bd; text-decoration: none; padding: 10px; margin: 5px 0; border-radius: 8px; }
    .sidebar a.active, .sidebar a:hover { background: #343a40; color: white; }
    .content { margin-left: 240px; padding: 30px; transition: margin 0.3s; }
    .toggle-btn { position: fixed; top: 15px; left: 15px; z-index: 1100; border-radius: 50%; width: 45px; height: 45px; font-size: 20px; }
    .sidebar.collapsed { margin-left: -240px; }
    .content.collapsed { margin-left: 20px; }
  </style>
</head>
<body>

<button class="btn btn-dark toggle-btn" onclick="toggleSidebar()">☰</button>

<div class="sidebar">
  <h4 class="mb-4">Dashboard</h4>
  <ul class="nav flex-column nav-pills" id="sideTabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#users">المستخدمين</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#articles">المقالات</a>
    </li>
  </ul>
</div>

<div class="content">
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function toggleSidebar(){
  document.querySelector('.sidebar').classList.toggle('collapsed');
  document.querySelector('.content').classList.toggle('collapsed');
}

// =====================
// Load More AJAX (Delegation)
// =====================
document.addEventListener('click', function(e){
    if(e.target && e.target.id === 'loadMoreUsers') loadMore(e.target);
    if(e.target && e.target.id === 'loadMorePosts') loadMore(e.target);
});

function loadMore(button){
    let type = button.getAttribute('data-type');
    let page = button.getAttribute('data-page');

    fetch(`/load-more?type=${type}&page=${page}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(html => {
        if(html.trim() === ''){
            button.style.display = 'none';
            return;
        }
        document.getElementById(`${type}-table`).insertAdjacentHTML('beforeend', html);
        button.setAttribute('data-page', parseInt(page)+1);
    });
}
</script>

@yield('scripts')

</body>
</html>
