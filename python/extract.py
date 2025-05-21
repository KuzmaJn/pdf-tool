import sys
from pypdf import PdfWriter, PdfReader

if len(sys.argv) != 4:
    print("Usage: extract.py input.pdf page_number output.pdf")
    sys.exit(1)

input_pdf = sys.argv[1]
page_number = int(sys.argv[2])
output_pdf = sys.argv[3]

try:
    reader = PdfReader(input_pdf)
    writer = PdfWriter()

    # Kontrola, či zadaná stránka existuje
    if page_number > len(reader.pages):
        print(f"Error: PDF has only {len(reader.pages)} pages")
        sys.exit(1)

    # Pridanie požadovanej stránky
    writer.add_page(reader.pages[page_number - 1])

    # Uloženie výstupného PDF
    with open(output_pdf, "wb") as out:
        writer.write(out)

except Exception as e:
    print(f"Error: {str(e)}")
    sys.exit(1)
