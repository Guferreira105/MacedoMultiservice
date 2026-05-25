# Macedo Multiservices - Documentação Completa para Versal

## Informações do Projeto

- **Nome:** Macedo Multiservices
- **Tipo:** Landing Page Profissional - Serviços Elétricos
- **Idiomas:** Espanhol (ES) e Inglês (EN)
- **Ano:** 2026

---

## Estrutura de Arquivos

```
macedo-multiservices/
├── index.html              (1124 linhas - HTML + CSS + JS tudo inline)
├── send.php                (71 linhas - backend de email via PHP mail())
├── DOCUMENTACAO_VERSAL.md  (este arquivo)
├── assets/
│   ├── css/                (vazio - CSS está inline no index.html)
│   ├── js/                 (vazio - JS está inline no index.html)
│   └── img/                (51 arquivos + 1 subpasta)
│       ├── dono.png                     (foto do proprietário)
│       ├── logo.png                     (favicon / logo navbar)
│       ├── logo-about.jfif              (logo seção "Sobre")
│       ├── favicon.jfif
│       ├── instalacao-residencial.png   (bg card serviço 1)
│       ├── pisos-vinilicos.jpg          (bg card serviço 2)
│       ├── reparos.jpg                  (bg card serviço 3)
│       ├── forro-capa.jpeg              (bg card serviço 4)
│       ├── ar-condicionado.webp         (bg card serviço 5)
│       ├── ar-condicionado.jpg
│       ├── ar-condicionado.png
│       ├── ar-condicionado-1.jpeg       (galeria serviço 5)
│       ├── ar-condicionado-2.jpeg
│       ├── ar-condicionado-3.jpeg
│       ├── ar-condicionado-4.jpeg
│       ├── residencial-1.jpg            (galeria serviço 1)
│       ├── residencial-2.jpg
│       ├── residencial-3.jpg
│       ├── residencial-4.jpg
│       ├── pisos-1.jpg                  (galeria serviço 2)
│       ├── pisos-2.jpg
│       ├── pisos-3.jpg
│       ├── pisos-4.jpg
│       ├── pisos-5.jpg
│       ├── pisos-6.jpg
│       ├── pisos-7.jpg
│       ├── pisos-8.jpg
│       ├── reparos-1.jpg               (galeria serviço 3)
│       ├── reparos-2.jpg
│       ├── reparos-3.jpg
│       ├── reparos-4.jpg
│       ├── reparos-5.jpg
│       ├── forro-1.jpeg                (galeria serviço 4)
│       ├── forro-2.jpeg
│       ├── forro-3.jpeg
│       ├── forro-4.jpeg
│       ├── forro-5.jpeg
│       ├── forro-6.jpeg
│       ├── solar-capa.jpeg             (bg card + galeria serviço 6)
│       ├── solar-1.jpeg                (galeria serviço 6)
│       ├── solar-2.jpeg
│       ├── solar-3.jpeg
│       ├── solar-4.jpeg
│       ├── solar-5.jpeg
│       ├── solar-6.jpeg
│       ├── solar-7.jpeg
│       ├── solar-8.jpeg
│       ├── solar-9.jpeg
│       ├── solar-10.jpeg
│       ├── solar-11.jpeg
│       └── obras/
│           ├── obra1.jpg
│           ├── obra1.png
│           ├── obra2.png
│           ├── obra3.png
│           ├── obra4.png
│           ├── obra5.png
│           └── obra6.png
```

---

## Seções da Página

| # | Seção | ID | Descrição |
|---|-------|----|-----------|
| 1 | **Header** | - | Nav fixa com logo, links e botão de idioma |
| 2 | **Hero** | `#inicio` | Banner principal com foto, estatísticas e CTA |
| 3 | **Sobre** | `#nosotros` | Quem somos, logo, lista de diferenciais |
| 4 | **Serviços** | `#servicios` | 6 cards com imagem de fundo + modal com galeria |
| 5 | **Por que nos escolher** | - | 4 cards numerados (01-04) |
| 6 | **Testimonios** | `#testimonios` | Carrossel com 8 depoimentos, dots e setas |
| 7 | **Contato** | `#contacto` | Formulário + informações de contato |
| 8 | **Footer** | - | Logo, links, serviços, contato, redes sociais |
| 9 | **WhatsApp Float** | - | Botão flutuante do WhatsApp |
| 10 | **Service Modal** | - | Modal com galeria de fotos por serviço |
| 11 | **Lightbox** | - | Visualização ampliada de fotos |

---

## Funcionalidades

### 1. Multi-idioma (ES / EN)
- Botão toggle no header
- Traduções inline via objeto `langData` no JS
- `data-i18n` e `data-i18n-placeholder` nos elementos HTML
- Placeholders e selects são traduzidos dinamicamente

### 2. Formulário de Contato (3 canais)
- **EmailJS** (serviço cloud) - requer chave pública
- **PHP mail()** (`send.php`) - backend próprio
- **WhatsApp** - abre link direto `wa.me`
- Todos os 3 são disparados simultaneamente no submit

### 3. Configuração Centralizada
```js
const CONFIG = {
  emailjs: {
    publicKey: 'YOUR_PUBLIC_KEY',   // <-- PRECISA CONFIGURAR
    serviceID: 'YOUR_SERVICE_ID',   // <-- PRECISA CONFIGURAR
    templateID: 'YOUR_TEMPLATE_ID', // <-- PRECISA CONFIGURAR
    enabled: true
  },
  whatsapp: {
    number: '34613965087',
    enabled: true
  },
  php: {
    url: 'send.php',
    enabled: true
  }
};
```

### 4. Carrossel de Depoimentos
- Automático (4s) com pausa no hover/touch
- Navegação por setas e dots
- Swipe em mobile
- 8 depoimentos

### 5. Modal de Serviços + Galeria
- 6 serviços com fotos em grid (2 colunas)
- Cada card de serviço abre um modal com as fotos do serviço
- Lightbox para ver foto ampliada
- Navegação por teclado (setas, ESC)

---

## Serviços Oferecidos

| # | Serviço | Fotos |
|---|---------|-------|
| 1 | Instalações Residenciais | 4 fotos |
| 2 | Pisos Vinílicos | 8 fotos |
| 3 | Reparações e Avarias | 5 fotos |
| 4 | Forro de Pinus e Boiler a Gás | 7 fotos |
| 5 | Instalação de Ar Condicionado | 5 fotos |
| 6 | Energia Solar e Carregadores | 12 fotos |

---

## Informações de Contato

- **Telefone:** +34 613 96 50 87
- **Email:** macedo@macedomultiservices.com
- **WhatsApp:** +34 613 96 50 87
- **Localização:** Madrid, España
- **Horário:** Seg–Sex: 8:00–19:00 / Sáb: 9:00–14:00

---

## Antes de Publicar na Versal (CHECKLIST)

### ⚠️ Configurações Obrigatórias
- [ ] **EmailJS** - Substituir `YOUR_PUBLIC_KEY`, `YOUR_SERVICE_ID` e `YOUR_TEMPLATE_ID` no `index.html` (linha ~637-640)
- [ ] **PHP** - Verificar se a hospedagem suporta PHP e a função `mail()`. Se não, desabilitar (`enabled: false`) ou configurar SMTP no `send.php`
- [ ] **send.php** - Confirmar que o email `owner_email` está correto (linha 5)
- [ ] **WhatsApp** - Confirmar se o número está correto (já configurado: +34 613 96 50 87)

### ✅ Verificações de Imagens
- [ ] `dono.png` - existe? (foto do proprietário no hero)
- [ ] `logo.png` - existe? (favicon e logo)
- [ ] Todas as imagens de galeria dos 6 serviços existem?
- [ ] Todas as imagens de background dos cards existem?

### 🌐 Publicação
- Enviar **todos os arquivos** via FTP para a hospedagem
- Manter a estrutura de pastas exatamente como está
- O domínio deve apontar para a raiz onde está o `index.html`

### 📱 SEO / Meta
- [ ] Título: "Macedo Multiservices - Electricista Profesional"
- [ ] Meta description: adicionar se necessário (não está presente atualmente)
- [ ] Favicon configurado (usa `logo.png`)

---

## Observações Técnicas

- **CSS e JS estão inline** no `index.html` (sem arquivos separados em `assets/css/` ou `assets/js/`)
- O **PHP** usa `mail()` nativo (pode não funcionar em todos os servidores - verificar suporte)
- O **EmailJS** precisa de cadastro gratuito em https://www.emailjs.com/ para gerar as chaves
- O **carrossel** usa `transform: translateX()` para transição entre slides
- **Responsivo**: adaptado para desktop, tablet (1024px) e mobile (768px, 480px)
- **Acessibilidade**: menu hamburger em mobile, teclas de seta no lightbox, ESC para fechar modais
