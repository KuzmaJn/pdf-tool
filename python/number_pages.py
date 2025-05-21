#!/usr/bin/env python3
import sys, io
from pypdf import PdfReader, PdfWriter
from reportlab.pdfgen import canvas
from reportlab.pdfbase.pdfmetrics import stringWidth

if len(sys.argv) != 5:
    print("Usage: number_pages.py input.pdf start position output.pdf")
    sys.exit(1)

input_pdf, start_str, position, output_pdf = sys.argv[1:]
start = int(start_str)

reader = PdfReader(input_pdf)
writer = PdfWriter()
total = len(reader.pages)

# rozmery prvej strany
first = reader.pages[0].mediabox
w, h = float(first.width), float(first.height)

# fontové nastavenie
font_name = "Helvetica"
font_size = 12
margin = 30  # vzdialenosť od okraja

for idx, page in enumerate(reader.pages, start=start):
    buf = io.BytesIO()
    can = canvas.Canvas(buf, pagesize=(w, h))
    can.setFont(font_name, font_size)
    text = f"{idx} / {start + total - 1}"
    text_width = stringWidth(text, font_name, font_size)

    # spočítaj pozíciu
    if position == "bottom-center":
        x, y = w/2, margin
        can.drawCentredString(x, y, text)
    elif position == "bottom-left":
        x, y = margin, margin
        can.drawString(x, y, text)
    elif position == "bottom-right":
        x, y = w - margin, margin
        can.drawString(x - text_width, y, text)
    elif position == "top-center":
        x, y = w/2, h - margin
        can.drawCentredString(x, y, text)
    elif position == "top-left":
        x, y = margin, h - margin
        can.drawString(x, y, text)
    elif position == "top-right":
        x, y = w - margin, h - margin
        can.drawString(x - text_width, y, text)
    else:
        # fallback na bottom-center
        can.drawCentredString(w/2, margin, text)

    can.save()
    buf.seek(0)

    overlay = PdfReader(buf).pages[0]
    page.merge_page(overlay)
    writer.add_page(page)

with open(output_pdf, "wb") as out:
    writer.write(out)
