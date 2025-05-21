#!/usr/bin/env python3
import sys
from reportlab.lib.pagesizes import letter, landscape, portrait
from reportlab.pdfgen import canvas
from textwrap import wrap

if len(sys.argv) != 5:
    print("Usage: create.py output.pdf orientation title content")
    sys.exit(1)

output_pdf, orientation, title, content = sys.argv[1:]
orientation = orientation.lower()

# Vyber stránku a orientáciu
pagesize = portrait(letter)
if orientation == 'landscape':
    pagesize = landscape(letter)
width, height = pagesize

# vykreslenie titulku na vrch každej stránky
def draw_header(c):
    c.setFont("Helvetica-Bold", 24)
    c.drawCentredString(width / 2, height - 50, title)

#Vytvor canvas a nakresli prvú hlavičku
c = canvas.Canvas(output_pdf, pagesize=pagesize)
draw_header(c)

c.setFont("Helvetica", 12)
line_height   = 14
left_margin   = 50
top_margin    = height - 100
bottom_margin = 50
max_chars     = 100

text_y   = top_margin
text_obj = c.beginText(left_margin, text_y)

#loopujem cez riadky a zalamovanie
for paragraph in content.split('\n'):
  for line in wrap(paragraph, max_chars):
    # ak sme pod marginom, nová strana
    if text_y < bottom_margin:
      c.drawText(text_obj)
      c.showPage()
      draw_header(c)
      c.setFont("Helvetica", 12)
      text_y   = top_margin
      text_obj = c.beginText(left_margin, text_y)

    text_obj.textLine(line + "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!§")
    text_y -= line_height

#Dokresli zvyšok a ulož
c.drawText(text_obj)
c.save()
