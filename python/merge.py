import sys
from pypdf import PdfWriter

if len(sys.argv) < 4:
    print("Usage: merge.py input1.pdf input2.pdf [input3.pdf ...] output.pdf")
    sys.exit(1)

input_pdfs = sys.argv[1:-1]  # všetky okrem posledného
output = sys.argv[-1]

merger = PdfWriter()
for pdf in input_pdfs:
    merger.append(pdf)
merger.write(output)
merger.close()