<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Relatório</title>
  <link rel="icon" href="images/logo.png" type="image/x-icon">

  <!-- ML OPCIONAL (se não carregar, cai no fallback lexical) -->
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@4.20.0/dist/tf.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/universal-sentence-encoder@1.3.3/dist/universal-sentence-encoder.min.js"></script>

  <style>
    /* Reset */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html, body { height: 100%; }
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex; flex-direction: column;
    }

    /* Navbar */
    .navbar {
      position: sticky; top: 0;
      display: flex; align-items: center; justify-content: space-between;
      padding: 16px 24px; background-color: #ff66007c; height: 70px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.18); z-index: 100;
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

    /* Conteúdo */
    .content { display: flex; flex-direction: column; align-items: center;
      gap: 14px; padding: 24px; width: 100%; flex: 1; }
    h2 { font-size: 2rem; color: #222; margin: 4px 0 6px; text-align: center; }
    .ml-badge {
      font-size: 0.75rem; margin-left: 8px; padding: 2px 6px; border-radius: 10px;
      background: #eee; color: #333; border: 1px solid #ddd;
    }

    /* Toolbar */
    .toolbar { display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
      width: 80%; max-width: 900px; }
    .search-box { flex: 1 1 280px; display: flex; }
    .search-box input {
      width: 100%; padding: 12px; font-size: 1rem;
      border: 1px solid #ccc; border-radius: 6px; outline: none; height: 42px;
    }

    /* Tabela */
    .table-wrap { display: flex; width: 80%; max-width: 900px; }
    table {
      border-collapse: collapse; width: 100%; background: #fff; border-radius: 10px; overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    th, td { padding: 14px; text-align: left; border-bottom: 1px solid #ddd; }
    th { background: #ff6600c0; color: #fff; font-size: 1rem; }

    /* Zebra */
    tbody tr:nth-child(odd) { background-color: #fafafa; }
    tbody tr:nth-child(even) { background-color: #f0f0f0; }
    tbody tr:hover { background-color: #e6e6e6; }

    /* Contador centralizado (Opção A) */
    .counter-row {
      display: flex; justify-content: center; width: 80%; max-width: 900px; margin-top: 6px;
    }
    .counter {
      white-space: nowrap; line-height: 1; padding: 12px 0;
      font-size: 0.95rem; color: #333; display: flex; align-items: center;
    }

    /* Paginação */
    .pagination {
      display: flex; align-items: center; justify-content: center; flex-wrap: wrap;
      gap: 6px; margin-top: 12px; width: 80%; max-width: 900px;
    }
    .pagination button {
      padding: 8px 12px; border: 1px solid #ccc; background: #fff;
      border-radius: 6px; cursor: pointer; font-size: 0.95rem;
    }
    .pagination button[disabled] { opacity: .5; cursor: not-allowed; }
    .pagination .page-btn.active {
      background: #ff6600c0; color: #fff; border-color: #ff6600c0; font-weight: bold;
    }

    @media (max-width: 960px) { .toolbar, .table-wrap, .counter-row, .pagination { width: 100%; } }
    @media (max-width: 480px) { h2 { font-size: 1.6rem; } th, td { padding: 10px; font-size: .95rem; } }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="left"><div class="logo" title="Logo Escola"><img src="images/logo.png" alt="Logo Escola" /></div></div>
    <div class="center"><span class="title">Relatório</span></div>
    <div class="right"><button class="logoff-btn" onclick="logoff()">Logoff</button></div>
  </nav>

  <!-- CONTEÚDO -->
  <main class="content">
    <h2>Relatório de Inscrições
      <span id="mlStatus" class="ml-badge" title="Status do modelo de busca">ML: iniciando…</span>
    </h2>

    <!-- Toolbar -->
    <section class="toolbar">
      <div class="search-box">
        <input type="text" id="searchInput" placeholder="Pesquisar por nome, CPF ou data (dd/mm/aaaa)..." />
      </div>
    </section>

    <!-- Tabela -->
    <div class="table-wrap">
      <table id="relatorioTable">
        <thead>
          <tr><th>Nome</th><th>CPF</th><th>Data de Inscrição</th></tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <!-- Contador centralizado -->
    <div class="counter-row">
      <div class="counter" id="counter">Mostrando 0–0 de 0</div>
    </div>

    <!-- Paginação -->
    <nav class="pagination" id="pagination"></nav>
  </main>

  <script>
    function logoff(){ alert('Você saiu!'); window.location.href='login.html'; }

    /* ===================== DADOS (30) ===================== */
    const dados = [
      { nome: "João da Silva", cpf: "123.456.789-00", data: "01/09/2025" },
      { nome: "Maria Oliveira", cpf: "987.654.321-11", data: "25/08/2025" },
      { nome: "Carlos Pereira", cpf: "111.222.333-44", data: "20/08/2025" },
      { nome: "Ana Beatriz", cpf: "222.333.444-55", data: "18/08/2025" },
      { nome: "Rafael Santos", cpf: "333.444.555-66", data: "15/08/2025" },
      { nome: "Fernanda Lima", cpf: "444.555.666-77", data: "12/08/2025" },
      { nome: "Bruno Melo", cpf: "555.666.777-88", data: "10/08/2025" },
      { nome: "Camila Costa", cpf: "666.777.888-99", data: "08/08/2025" },
      { nome: "Eduardo Souza", cpf: "777.888.999-00", data: "05/08/2025" },
      { nome: "Patrícia Gomes", cpf: "888.999.000-11", data: "03/08/2025" },
      { nome: "Lucas Rocha", cpf: "999.000.111-22", data: "01/08/2025" },
      { nome: "Mariana Alves", cpf: "000.111.222-33", data: "30/07/2025" },
      { nome: "Rodrigo Farias", cpf: "101.202.303-44", data: "28/07/2025" },
      { nome: "Aline Ribeiro", cpf: "202.303.404-55", data: "26/07/2025" },
      { nome: "Pedro Henrique", cpf: "303.404.505-66", data: "24/07/2025" },
      { nome: "Bianca Torres", cpf: "404.505.606-77", data: "22/07/2025" },
      { nome: "Gustavo Nunes", cpf: "505.606.707-88", data: "20/07/2025" },
      { nome: "Isabela Martins", cpf: "606.707.808-99", data: "18/07/2025" },
      { nome: "Thiago Cunha", cpf: "707.808.909-10", data: "16/07/2025" },
      { nome: "Larissa Pires", cpf: "808.909.010-21", data: "14/07/2025" },
      { nome: "Daniel Cardoso", cpf: "909.010.121-32", data: "12/07/2025" },
      { nome: "Tatiane Freitas", cpf: "010.121.232-43", data: "10/07/2025" },
      { nome: "Wagner Araújo", cpf: "121.232.343-54", data: "08/07/2025" },
      { nome: "Renata Prado", cpf: "232.343.454-65", data: "06/07/2025" },
      { nome: "Fábio Moraes", cpf: "343.454.565-76", data: "04/07/2025" },
      { nome: "Helena Duarte", cpf: "454.565.676-87", data: "02/07/2025" },
      { nome: "Caio Teixeira", cpf: "565.676.787-98", data: "30/06/2025" },
      { nome: "Sofia Carvalho", cpf: "676.787.898-09", data: "28/06/2025" },
      { nome: "Miguel Barros", cpf: "787.898.909-10", data: "26/06/2025" },
      { nome: "Nicole Rezende", cpf: "898.909.010-21", data: "24/06/2025" }
    ];

    /* ===================== ESTADO/UI ===================== */
    const PAGE_SIZE = 10;
    let currentPage = 1;
    let filtro = "";

    const tbody = document.querySelector("#relatorioTable tbody");
    const counterEl = document.getElementById("counter");
    const paginationEl = document.getElementById("pagination");
    const searchInput = document.getElementById("searchInput");
    const mlStatus = document.getElementById("mlStatus");

    /* ===================== UTILS ===================== */
    // normalização forte: remove acentos e espaços extras
    const fold = (t) =>
      (t || "")
        .toString()
        .normalize('NFD')
        .replace(/\p{Diacritic}/gu, '')
        .toLowerCase()
        .trim();

    const tokens = (t) => fold(t).split(/\s+/).filter(Boolean);

    /* ===================== PAGINAÇÃO ===================== */
    const paginate = (list, page, size) => {
      const total = list.length;
      const totalPages = Math.max(1, Math.ceil(total / size));
      const p = Math.min(Math.max(1, page), totalPages);
      const start = (p - 1) * size;
      const end = Math.min(start + size, total);
      return { slice: list.slice(start, end), start: start + 1, end, total, page: p, totalPages };
    };

    function renderPagination(totalPages) {
      const windowSize = 5;
      let startPage = Math.max(1, currentPage - Math.floor(windowSize / 2));
      let endPage = Math.min(totalPages, startPage + windowSize - 1);
      startPage = Math.max(1, Math.min(startPage, endPage - windowSize + 1));

      const btn = (label, disabled, onClick, cls="") =>
        `<button ${disabled ? "disabled" : ""} class="${cls}" onclick="${onClick}">${label}</button>`;

      let pages = "";
      for (let p = startPage; p <= endPage; p++) {
        pages += `<button class="page-btn ${p === currentPage ? "active" : ""}" onclick="goToPage(${p})">${p}</button>`;
      }

      paginationEl.innerHTML =
        btn("« Primeira", currentPage === 1, "goToPage(1)") +
        btn("‹ Anterior", currentPage === 1, "goToPage(currentPage-1)") +
        pages +
        btn("Próxima ›", currentPage === totalPages, "goToPage(currentPage+1)") +
        btn("Última »", currentPage === totalPages, `goToPage(${totalPages})`);
    }

    /* ===================== BUSCA LEXICAL (ROBUSTA) ===================== */
    function lexicalScore(row, qFold, qTokens) {
      const nomeF = fold(row.nome);
      const cpfF  = fold(row.cpf);
      const dataF = fold(row.data);

      // 1) match forte por substring em qualquer campo
      if (nomeF.includes(qFold) || cpfF.includes(qFold) || dataF.includes(qFold)) return 1.0;

      // 2) sobreposição de tokens no nome (aproximação simples)
      const nomeTokens = tokens(row.nome);
      if (qTokens.length && nomeTokens.length) {
        const setQ = new Set(qTokens);
        const inter = nomeTokens.filter(t => setQ.has(t)).length;
        return inter / Math.max(1, qTokens.length); // 0..1
      }
      return 0;
    }

    /* ===================== ML SEMÂNTICO (OPCIONAL) ===================== */
    let modelReady = false, useModel = null, rowEmbeddings = null;

    const rowText = (r) => `${r.nome} - CPF ${r.cpf} - inscrito em ${r.data}`;

    async function tryLoadML() {
      if (typeof window.use === "undefined") {
        if (mlStatus) {
          mlStatus.textContent = "ML: indisponível (fallback)";
          mlStatus.style.background = "#fff5f5";
          mlStatus.style.color = "#7f1d1d";
          mlStatus.style.borderColor = "#fecaca";
        }
        return;
      }
      try {
        if (mlStatus) mlStatus.textContent = "ML: carregando…";
        useModel = await use.load();
        const textos = dados.map(rowText);
        rowEmbeddings = await useModel.embed(textos); // [N,512]
        modelReady = true;
        if (mlStatus) {
          mlStatus.textContent = "ML: ativo";
          mlStatus.style.background = "#e7f7ec";
          mlStatus.style.color = "#14532d";
          mlStatus.style.borderColor = "#86efac";
        }
      } catch (e) {
        console.error("Falha ao carregar modelo:", e);
        modelReady = false;
        if (mlStatus) {
          mlStatus.textContent = "ML: indisponível (fallback)";
          mlStatus.style.background = "#fff5f5";
          mlStatus.style.color = "#7f1d1d";
          mlStatus.style.borderColor = "#fecaca";
        }
      }
    }

    function cosineSimVec(a, b) {
      const dot = a.mul(b).sum();
      const na = a.norm();
      const nb = b.norm();
      return dot.div(na.mul(nb)).dataSync()[0];
    }

    async function semanticScoreAll(term) {
      if (!modelReady || !rowEmbeddings) return null;
      const qEmbAll = await useModel.embed([term]); // [1,512]
      const q = qEmbAll.slice([0, 0], [1, qEmbAll.shape[1]]);
      const scores = new Array(dados.length);
      for (let i = 0; i < dados.length; i++) {
        const emb = rowEmbeddings.slice([i, 0], [1, rowEmbeddings.shape[1]]);
        scores[i] = cosineSimVec(emb, q); // ~0..1
      }
      return scores;
    }

    /* ===================== RANKEAMENTO COMBINADO ===================== */
    async function rank(dadosBase, queryRaw) {
      const qFold = fold(queryRaw);
      if (!qFold) return dadosBase;

      const qTokens = tokens(queryRaw);
      const semScores = await semanticScoreAll(queryRaw); // null se ML indisponível

      const W_LEX = 0.8, W_SEM = 0.2;
      const SEM_THRESHOLD = 0.60;  // evita falsos positivos
      const MIN_FINAL = 0.15;      // ruído residual

      const scored = dadosBase.map((row, idx) => {
        const lex = lexicalScore(row, qFold, qTokens);            // 0..1
        const sem = semScores ? Math.max(0, semScores[idx]) : 0;  // 0..1
        const semOk = (lex >= 0.5) ? true : (sem >= SEM_THRESHOLD);
        const finalScore = W_LEX * lex + W_SEM * sem;
        return { row, finalScore, semOk, lex };
      })
      .filter(x => x.lex >= 0.25 || (x.semOk && x.finalScore >= MIN_FINAL))
      .sort((a,b) => b.finalScore - a.finalScore)
      .map(x => x.row);

      // fallback se nada sobrar
      if (!scored.length) {
        return dadosBase.filter(r => {
          const jf = fold(r.nome) + " " + fold(r.cpf) + " " + fold(r.data);
          return jf.includes(qFold);
        });
      }
      return scored;
    }

    /* ===================== RENDER ===================== */
    async function render() {
      let base;
      if (filtro) {
        base = await rank(dados, filtro);
      } else {
        base = dados;
      }

      const { slice, start, end, total, page, totalPages } = paginate(base, currentPage, PAGE_SIZE);
      currentPage = page;

      tbody.innerHTML = slice.map(r => `
        <tr><td>${r.nome}</td><td>${r.cpf}</td><td>${r.data}</td></tr>
      `).join("");

      const s = total === 0 ? 0 : start;
      const e = total === 0 ? 0 : end;
      counterEl.textContent = `Mostrando ${s}–${e} de ${total}`;

      renderPagination(totalPages);
    }

    /* ===================== EVENTOS & INICIALIZAÇÃO ===================== */
    window.goToPage = function(p){ currentPage = p; render(); };
    searchInput.addEventListener("input", () => { filtro = searchInput.value; currentPage = 1; render(); });

    document.addEventListener("DOMContentLoaded", async () => {
      render();          // mostra já
      await tryLoadML(); // tenta ativar semântica
      // próximo input já usará ML se disponível
    });
  </script>
</body>
</html>
