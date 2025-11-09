<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro de Aulas</title>
  <link rel="icon" href="images/logo.png" type="image/x-icon">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body { height: 100%; }
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      flex-direction: column;
    }

    /* NAVBAR */
    .navbar {
      position: sticky;
      top: 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 16px 24px;
      background-color: #ff66007c;
      height: 70px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.18);
      z-index: 100;
    }
    .navbar .left, .navbar .center, .navbar .right {
      display: flex; align-items: center; gap: 12px; min-width: 0;
    }
    .navbar .center { justify-content: center; flex: 1; }
    .navbar .title { color: #fff; font-weight: bold; font-size: 1.05rem; white-space: nowrap; }
    .logo img { height: 46px; object-fit: contain; }
    .logoff-btn {
      padding: 8px 14px; background: #000000c7; color: #fff; border: 0; border-radius: 6px;
      cursor: pointer; font-weight: bold;
    }
    .logoff-btn:hover { background: #d62828; }

    /* CONTEÚDO */
    .content {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 14px;
      padding: 24px;
      width: 100%;
      flex: 1;
    }
    h2 { font-size: 2rem; color: #222; margin: 4px 0 6px; text-align: center; }

    /* FORMULÁRIO */
    .form-section {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      width: 80%;
      max-width: 900px;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .form-group {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }
    label { font-weight: bold; color: #333; }
    input, select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      outline: none;
    }
    button {
      padding: 10px 16px;
      background: #ff6600c0;
      color: #fff;
      border: 0;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      align-self: flex-end;
    }
    button:hover { background: #ff6600; }

    /* Checkbox group */
    .checkbox-group {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .checkbox-group label {
      font-weight: normal;
      display: flex;
      align-items: center;
      gap: 6px;
      cursor: pointer;
    }

    /* TABELA */
    .table-wrap {
      display: flex;
      width: 80%;
      max-width: 900px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    th, td { padding: 14px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background: #ff6600c0; color: #fff; font-size: 1rem; }
    tbody tr:nth-child(odd) { background-color: #fafafa; }
    tbody tr:nth-child(even) { background-color: #f0f0f0; }
    tbody tr:hover { background-color: #e6e6e6; }

    /* CONTADOR */
    .counter-row {
      display: flex;
      justify-content: center;
      width: 80%;
      max-width: 900px;
      margin-top: 6px;
    }
    .counter {
      white-space: nowrap;
      line-height: 1;
      padding: 12px 0;
      font-size: 0.95rem;
      color: #333;
      display: flex;
      align-items: center;
    }

    /* PAGINAÇÃO */
    .pagination {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 6px;
      margin-top: 12px;
      width: 80%;
      max-width: 900px;
    }
    .pagination button {
      padding: 8px 12px;
      border: 1px solid #ccc;
      background: #fff;
      border-radius: 6px;
      cursor: pointer;
      font-size: 0.95rem;
    }
    .pagination button[disabled] { opacity: .5; cursor: not-allowed; }
    .pagination .page-btn.active {
      background: #ff6600c0;
      color: #fff;
      border-color: #ff6600c0;
      font-weight: bold;
    }

    @media (max-width: 960px) {
      .form-section, .table-wrap, .counter-row, .pagination { width: 100%; }
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="left"><div class="logo"><img src="images/logo.png" alt="Logo" /></div></div>
    <div class="center"><span class="title">Cadastro de Aulas</span></div>
    <div class="right"><button class="logoff-btn" onclick="alert('Você saiu!')">Logoff</button></div>
  </nav>

  <!-- CONTEÚDO -->
  <main class="content">
    <h2>Cadastro de Aulas</h2>

    <!-- FORMULÁRIO -->
    <section class="form-section">
      <div class="form-group">
        <label>Selecione as Aulas:</label>
        <div class="checkbox-group">
          <label><input type="checkbox" value="Informática" class="aulaCheck" /> Informática</label>
          <label><input type="checkbox" value="Inglês" class="aulaCheck" /> Inglês</label>
          <label><input type="checkbox" value="Violão" class="aulaCheck" /> Violão</label>
        </div>
      </div>

      <div class="form-group">
        <label for="dataAula">Data da Aula:</label>
        <input type="date" id="dataAula" />
      </div>

      <div class="form-group">
        <label for="alunosVinculados">Alunos Vinculados:</label>
        <select id="alunosVinculados" multiple>
          <option>João da Silva</option>
          <option>Maria Oliveira</option>
          <option>Bruno Melo</option>
          <option>Camila Costa</option>
          <option>Rafael Santos</option>
          <option>Fernanda Lima</option>
          <option>Ana Beatriz</option>
        </select>
      </div>

      <button id="btnCadastrar">Cadastrar Aula</button>
    </section>

    <!-- TABELA -->
    <div class="table-wrap">
      <table id="aulasTable">
        <thead>
          <tr>
            <th>Aulas</th>
            <th>Data</th>
            <th>Alunos Vinculados</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <!-- CONTADOR -->
    <div class="counter-row">
      <div class="counter" id="counter">Mostrando 0–0 de 0</div>
    </div>

    <!-- PAGINAÇÃO -->
    <nav class="pagination" id="pagination"></nav>
  </main>

  <script>
    const aulas = [];
    const PAGE_SIZE = 5;
    let currentPage = 1;

    const tbody = document.querySelector("#aulasTable tbody");
    const counter = document.getElementById("counter");
    const pagination = document.getElementById("pagination");

    document.getElementById("btnCadastrar").addEventListener("click", () => {
      const data = document.getElementById("dataAula").value;
      const alunos = Array.from(document.getElementById("alunosVinculados").selectedOptions).map(o => o.value);
      const aulasSelecionadas = Array.from(document.querySelectorAll(".aulaCheck:checked")).map(c => c.value);

      if (aulasSelecionadas.length === 0 || !data || alunos.length === 0) {
        alert("Selecione pelo menos uma aula, uma data e um ou mais alunos.");
        return;
      }

      aulasSelecionadas.forEach(aula => {
        aulas.push({ nome: aula, data, alunos });
      });

      document.getElementById("dataAula").value = "";
      document.querySelectorAll(".aulaCheck").forEach(c => c.checked = false);
      document.getElementById("alunosVinculados").selectedIndex = -1;

      render();
    });

    function paginate(list, page, size) {
      const total = list.length;
      const totalPages = Math.max(1, Math.ceil(total / size));
      const p = Math.min(Math.max(1, page), totalPages);
      const start = (p - 1) * size;
      const end = Math.min(start + size, total);
      return { slice: list.slice(start, end), start: start + 1, end, total, page: p, totalPages };
    }

    function renderPagination(totalPages) {
      let html = "";
      for (let i = 1; i <= totalPages; i++) {
        html += `<button class="page-btn ${i === currentPage ? "active" : ""}" onclick="goToPage(${i})">${i}</button>`;
      }
      pagination.innerHTML = html;
    }

    function render() {
      const { slice, start, end, total, totalPages } = paginate(aulas, currentPage, PAGE_SIZE);
      tbody.innerHTML = slice.map(a => `
        <tr>
          <td>${a.nome}</td>
          <td>${new Date(a.data).toLocaleDateString("pt-BR")}</td>
          <td>${a.alunos.join(", ")}</td>
        </tr>
      `).join("");

      const s = total === 0 ? 0 : start;
      const e = total === 0 ? 0 : end;
      counter.textContent = `Mostrando ${s}–${e} de ${total}`;
      renderPagination(totalPages);
    }

    window.goToPage = (p) => { currentPage = p; render(); };
  </script>
</body>
</html>
