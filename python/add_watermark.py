#!/usr/bin/env python3
import sys, io
from pypdf import PdfReader, PdfWriter
from reportlab.pdfgen import canvas

if len(sys.argv) != 4:
    print("Usage: watermark.py input.pdf \"Watermark Text\" output.pdf")
    sys.exit(1)

input_pdf, watermark_text, output_pdf = sys.argv[1], sys.argv[2], sys.argv[3]

# načítame vstupný PDF
reader = PdfReader(input_pdf)
writer = PdfWriter()

# veľkosť prvej strany (bod = 1/72 palca)
first = reader.pages[0].mediabox
w, h = float(first.width), float(first.height)

# v pamäti vygenerujeme podklady s watermarkom
buf = io.BytesIO()
can = canvas.Canvas(buf, pagesize=(w, h))
can.setFont("Helvetica", 40)
can.setFillGray(0.5, 0.5)
can.saveState()
can.translate(w/2, h/2)
can.rotate(45)
can.drawCentredString(0, 0, watermark_text)
can.restoreState()
can.save()
buf.seek(0)

# načítame watermark ako PDF
wm_reader = PdfReader(buf)
wm_page = wm_reader.pages[0]

# mergujeme watermark na každú stranu
for page in reader.pages:
    page.merge_page(wm_page)
    writer.add_page(page)

# uložíme výsledok
with open(output_pdf, "wb") as out:
    writer.write(out)
