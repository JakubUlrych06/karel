## Verze 1: Karel (HTML, CSS, JavaScript)

### Popis
Tato verze je kompletně klientská a běží přímo v okně prohlížeče bez potřeby serveru. Veškeré příkazy zpracovává JavaScript, který vykresluje aktuální stav herního pole.


### Ovládání
- **Příkazy:**
  - \`down [číslo]\` - Posune Karla dolů o zadaný počet políček (výchozí je 1).
  - \`up [číslo]\` - Posune Karla nahoru o zadaný počet políček (výchozí je 1).
  - \`left [číslo]\` - Posune Karla doleva o zadaný počet políček (výchozí je 1).
  - \`right [číslo]\` - Posune Karla doprava o zadaný počet políček (výchozí je 1).
  - \`place [barva]\` - Položí zvolenou barvu na aktuální pozici Karla (např. \`place red\` nebo \`place #ff0000\`).
  - \`reset\` - Vyčistí herní pole a resetuje Karla na výchozí pozici.

- **Postup:**
  1. Zadejte příkazy do textového pole.
  2. Klikněte na tlačítko **Execute** pro spuštění příkazů.
  3. Klikněte na **Reset** pro obnovení pole.


## Verze 2: Karel (HTML, CSS, PHP)

### Popis
Tato verze používá serverové zpracování příkazů v PHP. Klient posílá příkazy na server přes formulář, který vygeneruje aktuální stav herního pole a vrátí ho zpět.


### Ovládání
- **Příkazy:**
  - \`down [číslo]\` - Posune Karla dolů o zadaný počet políček (výchozí je 1).
  - \`up [číslo]\` - Posune Karla nahoru o zadaný počet políček (výchozí je 1).
  - \`left [číslo]\` - Posune Karla doleva o zadaný počet políček (výchozí je 1).
  - \`right [číslo]\` - Posune Karla doprava o zadaný počet políček (výchozí je 1).
  - \`place [barva]\` - Položí zvolenou barvu na aktuální pozici Karla (např. \`place red\` nebo \`place #ff0000\`).
  - \`reset\` - Vyčistí herní pole a resetuje Karla na výchozí pozici.

- **Postup:**
  1. Zadejte příkazy do textového pole.
  2. Klikněte na **Execute** pro odeslání příkazů na server.
  3. Herní pole se aktualizuje na základě zpracování na serveru.

---
